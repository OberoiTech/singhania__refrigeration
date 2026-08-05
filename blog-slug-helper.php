<?php

if (!function_exists('sr_slugify')) {
    function sr_slugify($text) {
        $text = strtolower(trim((string)$text));
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        return trim($text, '-');
    }
}

// No DB column for slugs: this builds an [id => slug] map from titles alone, on every
// request. Slug is just the slugified title; if two posts share a title, later ones
// (higher id) get a -2, -3, ... suffix so URLs stay unique.
// Caveat: because nothing is stored, a post's slug shifts if its title changes (or if an
// earlier same-titled post is deleted) — there's no id in the URL to fall back on.
if (!function_exists('sr_blog_slug_map')) {
    function sr_blog_slug_map($conn) {
        $map = [];
        $counts = [];
        $result = mysqli_query($conn, 'SELECT id, title FROM blogs ORDER BY id ASC');
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $base = sr_slugify($row['title']);
                if ($base === '') {
                    $base = 'post';
                }
                $counts[$base] = isset($counts[$base]) ? $counts[$base] + 1 : 1;
                $slug = $counts[$base] > 1 ? $base . '-' . $counts[$base] : $base;
                $map[(int)$row['id']] = $slug;
            }
        }
        return $map;
    }
}
