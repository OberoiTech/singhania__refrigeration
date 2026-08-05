<?php
declare(strict_types=1);

header('Content-Type: application/xml; charset=UTF-8');

$baseUrl = 'https://singhaniarefrigeration.com';
$staticLastmod = '2026-07-15';
$staticUrls = [
    '/', '/about-us', '/products',
    '/truck-ac-installation-india',
    '/truck-refrigerator-container-manufacturer-in-india',
    '/cold-storage-refrigeration-units-manufacturer-in-india',
    '/compressor-rack-system-manufacturer-in-india',
    '/ammonia-refrigeration-units-manufacturer-in-india',
    '/freon-refrigeration-in-india',
    '/ripening-systems-manufacturer-in-india',
    '/multideck-cabinet-manufacturer-in-india',
    '/iqf-system-manufacturer-in-india',
    '/cold-storage-doors-manufacturer-in-india',
    '/puf-panels-manufacturer-in-india',
    '/dock-shelter-dock-leveler-manufacturer-in-india',
    '/heavy-duty-racks-manufacturer-in-india',
    '/consulting', '/solutions',
    '/turnkey-cold-storage-solutions-in-india',
    '/segment-wise-cold-storage-solutions-in-india',
    '/cold-chain-refrigeration-ca-store-freon-ammonia-in-india',
    '/cold-chain-quality-monitoring-solution-in-india',
    '/warehouse-management-solutions-in-india',
    '/transport-management-solutions-in-india',
    '/transport-refrigeration-solutions-in-india',
    '/contact', '/consultancy-cfa-training-services',
    '/privacy-policy', '/terms', '/blog',
];

$xmlEscape = static function (string $value): string {
    return htmlspecialchars($value, ENT_XML1 | ENT_QUOTES, 'UTF-8');
};

$dateOnly = static function (?string $value): string {
    if (!$value) return date('Y-m-d');
    $timestamp = strtotime($value);
    return $timestamp ? date('Y-m-d', $timestamp) : date('Y-m-d');
};

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($staticUrls as $path) {
    $priority = $path === '/' ? '1.0' : ($path === '/blog' ? '0.6' : '0.7');
    echo "  <url>\n";
    echo '    <loc>' . $xmlEscape($baseUrl . $path) . "</loc>\n";
    echo '    <lastmod>' . $staticLastmod . "</lastmod>\n";
    echo "    <priority>{$priority}</priority>\n";
    echo "  </url>\n";
}

// Blog posts are read from the same table used by blog.php.
require_once __DIR__ . '/admin/config.php';
require_once __DIR__ . '/blog-slug-helper.php';
$blogSlugMap = sr_blog_slug_map($conn);
$blogs = mysqli_query($conn, 'SELECT id, title, created_at FROM blogs ORDER BY created_at DESC, id DESC');
if ($blogs) {
    while ($blog = mysqli_fetch_assoc($blogs)) {
        $id = (int)($blog['id'] ?? 0);
        if ($id < 1) continue;
        $blogPath = '/blog/' . ($blogSlugMap[$id] ?? sr_slugify($blog['title']));
        echo "  <url>\n";
        echo '    <loc>' . $xmlEscape($baseUrl . $blogPath) . "</loc>\n";
        echo '    <lastmod>' . $dateOnly($blog['created_at'] ?? null) . "</lastmod>\n";
        echo "    <priority>0.5</priority>\n";
        echo "  </url>\n";
    }
}

echo '</urlset>' . "\n";
