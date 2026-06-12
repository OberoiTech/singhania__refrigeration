<?php

if (!function_exists('sr_normalize_meta_text')) {
    function sr_normalize_meta_text($value) {
        $value = trim(strip_tags((string)$value));
        return preg_replace('/\s+/', ' ', $value);
    }
}

if (!function_exists('sr_meta_length')) {
    function sr_meta_length($value) {
        return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
    }
}

if (!function_exists('sr_prepare_blog_seo_fields')) {
    function sr_prepare_blog_seo_fields($metaTitle, $metaDescription, $keywords) {
        $data = [
            'meta_title' => sr_normalize_meta_text($metaTitle),
            'meta_description' => sr_normalize_meta_text($metaDescription),
            'keywords' => sr_normalize_meta_text($keywords),
        ];

        $errors = [];
        $titleLength = sr_meta_length($data['meta_title']);
        $descriptionLength = sr_meta_length($data['meta_description']);
        $keywordsLength = sr_meta_length($data['keywords']);

        if ($titleLength < 30 || $titleLength > 60) {
            $errors[] = 'Meta Title must be between 30 and 60 characters.';
        }

        if ($descriptionLength < 50 || $descriptionLength > 160) {
            $errors[] = 'Meta Description must be between 50 and 160 characters.';
        }

        if ($keywordsLength < 1 || $keywordsLength > 255) {
            $errors[] = 'Keywords are required and must be 255 characters or less.';
        } else {
            $keywordsList = array_filter(array_map('sr_normalize_meta_text', explode(',', $data['keywords'])));
            $uniqueKeywords = [];

            foreach ($keywordsList as $keyword) {
                $keywordLength = sr_meta_length($keyword);

                if ($keywordLength < 2 || $keywordLength > 50) {
                    $errors[] = 'Each keyword must be between 2 and 50 characters.';
                    break;
                }

                if (!preg_match('/^[A-Za-z0-9 &,.\/-]+$/', $keyword)) {
                    $errors[] = 'Keywords can only contain letters, numbers, spaces, comma, ampersand, slash, dot, and hyphen.';
                    break;
                }

                $uniqueKeywords[strtolower($keyword)] = $keyword;
            }

            if (count($keywordsList) > 10) {
                $errors[] = 'Please enter no more than 10 comma-separated keywords.';
            }

            if (count($uniqueKeywords) !== count($keywordsList)) {
                $errors[] = 'Please remove duplicate keywords.';
            }

            $data['keywords'] = implode(', ', array_values($uniqueKeywords));
        }

        return [$data, $errors];
    }
}
