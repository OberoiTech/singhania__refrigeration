<?php
// error_reporting(0);

$path = $_SERVER['REQUEST_URI'];
$file = basename(parse_url($path, PHP_URL_PATH) ?: $path);  
$name = pathinfo($file, PATHINFO_FILENAME); 

$defaultTitle = 'Singhania Refrigeration – Trusted Cold Storage Solutions';
$aboutTitle = 'About Singhania Refrigeration | Cold Chain Solutions India';
$defaultDescription = 'Singhania Refrigeration provides advanced cold storage and refrigeration solutions including dock shelters, truck refrigeration, and cold rooms.';
$pageTitle = $defaultTitle;
$pageDescription = $defaultDescription;
$siteUrl = 'https://singhaniarefrigeration.com/';
$shareImage = $siteUrl . 'admin/uploads/image.jpg';
$twitterHandle = '@SinghaniaR59102';
$schemaPagePath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$schemaPageUrl = rtrim($siteUrl, '/') . (($schemaPagePath === '/' || $schemaPagePath === '/index.php') ? '/' : $schemaPagePath);

if (!function_exists('sr_schema_filter')) {
    function sr_schema_filter(array $value): array {
        foreach ($value as $key => $item) {
            if (is_array($item)) {
                $item = sr_schema_filter($item);
                if ($item === []) {
                    unset($value[$key]);
                    continue;
                }
            }
            if ($item === null || $item === '') {
                unset($value[$key]);
                continue;
            }
            $value[$key] = $item;
        }
        return $value;
    }
}

// Keep the shared head common, but allow the About page to use its own SEO title.
if (in_array(strtolower($file), ['about-us.php', 'about.php'], true)) {
    $pageTitle = $aboutTitle;
    $pageDescription = 'About Singhania Refrigeration and our cold storage, industrial refrigeration and cold chain solutions across India.';
}
?>

<!-- meta tag -->
        <meta charset="utf-8">
        <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
        <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:site_name" content="Singhania Refrigeration">
        <meta property="og:url" content="<?php echo htmlspecialchars($schemaPageUrl, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:type" content="website">
        <meta property="og:image" content="<?php echo htmlspecialchars($shareImage, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:image:alt" content="Singhania Refrigeration cold storage and industrial refrigeration solutions">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="<?php echo htmlspecialchars($twitterHandle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:creator" content="<?php echo htmlspecialchars($twitterHandle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:image" content="<?php echo htmlspecialchars($shareImage, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:image:alt" content="Singhania Refrigeration cold storage and industrial refrigeration solutions">
        <?php
          $schemaPhone = !empty($mobile) ? '+91' . preg_replace('/\D+/', '', $mobile) : null;
          $schemaSameAs = array_values(array_filter([
              !empty($facebook) ? $facebook : null,
              !empty($linkedin) ? $linkedin : null,
              'https://x.com/SinghaniaR59102',
              'https://www.instagram.com/singhaniarefrigeration/',
              'https://www.youtube.com/channel/UC-g2bewulBb2oGjPGIDAaJA',
          ]));

          $schemaOrganization = sr_schema_filter([
              '@context' => 'https://schema.org',
              '@type' => 'Organization',
              '@id' => $siteUrl . '#organization',
              'name' => 'Singhania Refrigeration',
              'url' => $siteUrl,
              'logo' => [
                  '@type' => 'ImageObject',
                  'url' => $siteUrl . 'assets/images/logo1.png',
              ],
              'description' => 'Singhania Refrigeration provides cold storage, ripening chamber installation and industrial refrigeration solutions across India for fruits and food storage.',
              'email' => !empty($email) ? $email : null,
              'telephone' => $schemaPhone,
              'address' => [
                  '@type' => 'PostalAddress',
                  'streetAddress' => '$address',
                  'addressLocality' => 'New Delhi',
                  'addressRegion' => 'Delhi',
                  'addressCountry' => 'IN',
              ],
              'contactPoint' => [
                  '@type' => 'ContactPoint',
                  'contactType' => 'customer service',
                  'telephone' => $schemaPhone,
                  'email' => !empty($email) ? $email : null,
                  'areaServed' => 'IN',
                  'availableLanguage' => ['en', 'hi'],
              ],
              'sameAs' => $schemaSameAs,
          ]);

          $schemaWebsite = sr_schema_filter([
              '@context' => 'https://schema.org',
              '@type' => 'WebSite',
              '@id' => $siteUrl . '#website',
              'url' => $siteUrl,
              'name' => 'Singhania Refrigeration',
              'publisher' => [
                  '@id' => $siteUrl . '#organization',
              ],
              'inLanguage' => 'en-IN',
          ]);

          $schemaPage = sr_schema_filter([
              '@context' => 'https://schema.org',
              '@type' => 'WebPage',
              '@id' => $schemaPageUrl . '#webpage',
              'url' => $schemaPageUrl,
              'name' => $pageTitle,
              'isPartOf' => [
                  '@id' => $siteUrl . '#website',
              ],
              'about' => [
                  '@id' => $siteUrl . '#organization',
              ],
          ]);
        ?>
        <script type="application/ld+json">
<?php echo json_encode($schemaOrganization, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
        </script>
        <script type="application/ld+json">
<?php echo json_encode($schemaWebsite, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
        </script>
        <script type="application/ld+json">
<?php echo json_encode($schemaPage, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
        </script>
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png.html">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.jpeg">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- font-awesome css -->
        <!-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"> -->
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <!-- aos css -->
        <link rel="stylesheet" type="text/css" href="assets/css/aos.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
        <!-- linea-font css -->
        <link rel="stylesheet" type="text/css" href="assets/fonts/linea-fonts.css">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="assets/css/rsmenu-main.css">
        <!-- nivo slider CSS -->
        <link rel="stylesheet" type="text/css" href="assets/inc/custom-slider/css/nivo-slider.css">
        <link rel="stylesheet" type="text/css" href="assets/inc/custom-slider/css/preview.css">
        <!-- rsmenu transitions css -->
        <link rel="stylesheet" href="assets/css/rsmenu-transitions.css">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous">
        
        <link rel="canonical" href="https://singhaniarefrigeration.com/" />

        <!-- Performance hints -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- Modern, readable UI font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


