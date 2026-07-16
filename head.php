<?php
// error_reporting(0);

$path = $_SERVER['REQUEST_URI'];
$file = basename(parse_url($path, PHP_URL_PATH) ?: $path);  
$name = pathinfo($file, PATHINFO_FILENAME); 

$defaultTitle = 'Singhania Refrigeration – Trusted Cold Storage Solutions';
$aboutTitle = 'About Singhania Refrigeration | Cold Chain Solutions India';
$defaultDescription = 'Singhania Refrigeration provides advanced cold storage and refrigeration solutions including dock shelters, truck refrigeration, and cold rooms.';
$defaultKeywords = 'cold storage solutions, industrial refrigeration, cold chain solutions, Singhania Refrigeration';
$pageTitle = $pageTitle ?? $defaultTitle;
$pageDescription = $pageDescription ?? $defaultDescription;
$pageKeywords = $pageKeywords ?? $defaultKeywords;
$siteUrl = 'https://singhaniarefrigeration.com/';
$shareImage = $shareImage ?? $siteUrl . 'admin/uploads/image.jpg';
$shareImageAlt = $shareImageAlt ?? 'Singhania Refrigeration cold storage and industrial refrigeration solutions';
$ogType = $ogType ?? 'website';
$twitterHandle = '@SinghaniaR59102';
$email = $email ?? '';
$mobile = $mobile ?? '';
$facebook = $facebook ?? '';
$linkedin = $linkedin ?? '';
$address = $address ?? '';
$canonicalRoutes = [
    'index.php' => '',
    'truck-ac.php' => 'truck-ac-manufacturer-in-india',
    'truck-refrigerator-container.php' => 'truck-refrigerator-container-manufacturer-in-india',
    'cold-storage-refrigeration-units.php' => 'cold-storage-refrigeration-units-manufacturer-in-india',
    'compressor-rack-system.php' => 'compressor-rack-system-manufacturer-in-india',
    'ammonia-refrigeration-units.php' => 'ammonia-refrigeration-units-manufacturer-in-india',
    'freon-refrigeration-units.php' => 'freon-refrigeration-in-india',
    'ripening-systems.php' => 'ripening-systems-manufacturer-in-india',
    'multideck-cabinet.php' => 'multideck-cabinet-manufacturer-in-india',
    'iqf.php' => 'iqf-system-manufacturer-in-india',
    'doors-ca-doors.php' => 'cold-storage-doors-manufacturer-in-india',
    'panels.php' => 'puf-panels-manufacturer-in-india',
    'dock-shelter-dock-leveler.php' => 'dock-shelter-dock-leveler-manufacturer-in-india',
    'heavy-duty-racks.php' => 'heavy-duty-racks-manufacturer-in-india',
    'turnkey-solution.php' => 'turnkey-cold-storage-solutions-in-india',
    'segments-wise.php' => 'segment-wise-cold-storage-solutions-in-india',
    'cold-chain-refrigeration-ca-store-freon-ammonia.php' => 'cold-chain-refrigeration-ca-store-freon-ammonia-in-india',
    'quality-monitoring-solution.php' => 'cold-chain-quality-monitoring-solution-in-india',
    'ware-house-management.php' => 'warehouse-management-solutions-in-india',
    'transport-management.php' => 'transport-management-solutions-in-india',
    'transport-refrigeration.php' => 'transport-refrigeration-solutions-in-india',
];
$scriptFile = basename($_SERVER['SCRIPT_NAME'] ?? $file);
$canonicalPath = array_key_exists($scriptFile, $canonicalRoutes)
    ? $canonicalRoutes[$scriptFile]
    : preg_replace('/\.php$/i', '', $scriptFile);
$generatedCanonicalUrl = $siteUrl . ltrim((string)$canonicalPath, '/');
$canonicalUrl = $canonicalUrl ?? $generatedCanonicalUrl;
$schemaPageUrl = $canonicalUrl;

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
$ogTitle = $ogTitle ?? $pageTitle;
$ogDescription = $ogDescription ?? $pageDescription;
$twitterTitle = $twitterTitle ?? $pageTitle;
$twitterDescription = $twitterDescription ?? $pageDescription;
?>

<!-- meta tag -->
        <meta charset="utf-8">
        <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
        <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="<?php echo htmlspecialchars($ogTitle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:site_name" content="Singhania Refrigeration">
        <meta property="og:url" content="<?php echo htmlspecialchars($schemaPageUrl, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:description" content="<?php echo htmlspecialchars($ogDescription, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:type" content="<?php echo htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:image" content="<?php echo htmlspecialchars($shareImage, ENT_QUOTES, 'UTF-8'); ?>">
        <meta property="og:image:alt" content="<?php echo htmlspecialchars($shareImageAlt, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="<?php echo htmlspecialchars($twitterHandle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:creator" content="<?php echo htmlspecialchars($twitterHandle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:title" content="<?php echo htmlspecialchars($twitterTitle, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:description" content="<?php echo htmlspecialchars($twitterDescription, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:image" content="<?php echo htmlspecialchars($shareImage, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:image:alt" content="<?php echo htmlspecialchars($shareImageAlt, ENT_QUOTES, 'UTF-8'); ?>">
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
              '@type' => 'LocalBusiness',
              '@id' => $siteUrl . '#organization',
              'name' => 'Singhania Refrigeration',
              'url' => $siteUrl,
              'image' => $siteUrl . 'assets/images/logoS.png',
              'priceRange' => '$$',
              'logo' => [
                  '@type' => 'ImageObject',
                  'url' => $siteUrl . 'assets/images/logoS.png',
              ],
              'description' => 'Singhania Refrigeration provides cold storage, ripening chamber installation and industrial refrigeration solutions across India for fruits and food storage.',
              'email' => !empty($email) ? $email : null,
              'telephone' => $schemaPhone,

               "address" => [
                "@type"=> "PostalAddress",
                "streetAddress"=> "C-19, Okhla Phase-I",
                "addressLocality"=> "New Delhi",
                "addressRegion"=> "DL",
                "postalCode"=> "110020",
                "addressCountry"=> "IN"
               ],

               'geo' =>[
                 "@type"=> "GeoCoordinates",
                 "latitude"=> "28.5355",
                 "longitude"=> "77.2588"
               ],

                "areaServed"=> [
                        "Delhi NCR", "Okhla", "South Delhi", "Noida", "Gurgaon", "Faridabad", "India"
                ],
              'openingHoursSpecification' => [
                  '@type' => 'OpeningHoursSpecification',
                  'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                  'opens' => '09:30',
                  'closes' => '18:30',
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

            $schemaProductList = sr_schema_filter([
              '@context' => 'https://schema.org',
              '@type' => 'ItemList',
              '@id' => $siteUrl . '#product-item-list',
              'name' => 'Singhania Refrigeration Product',
              'description' => 'Cold storage, industrial refrigeration and cold chain services offered by Singhania Refrigeration across India.',
              'itemListElement' => [
                  [
                      '@type' => 'ListItem',
                      'position' => 1,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'Truck AC',
                          'description' => 'Reliable transport cooling with fast pull-down, energy efficiency, and nationwide AMC support.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 2,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'truck-refrigerator-container',
                          'description' => 'Rugged insulated containers with reliable cooling to protect temperature-sensitive cargo end-to-end.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 3,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'cold-storage-refrigeration-units',
                          'description' => 'Trusted, energy-efficient systems for warehouses and cold rooms with precise temperature control.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 4,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'compressor-rack-system',
                          'description' => 'High-capacity, energy-efficient refrigeration for multi-room and industrial applications.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 5,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'ammonia-refrigeration-units',
                          'description' => 'Eco-friendly, high-efficiency cooling built for heavy-duty industrial applications.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 5,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'ammonia-refrigeration-units',
                          'description' => 'Eco-friendly, high-efficiency cooling built for heavy-duty industrial applications.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 6,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'ripening-systems',
                          'description' => 'Controlled-atmosphere solutions for uniform, high-quality ripening.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 7,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'multideck-cabinet',
                          'description' => 'High-visibility retail display with consistent, energy-efficient cooling.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 8,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'iqf',
                          'description' => 'Eco-friendly, high-efficiency cooling built for heavy-duty industrial applications.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 9,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'doors-ca-doors',
                          'description' => 'Durable, insulated doors with precision sealing for energy-efficient cold rooms.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 10,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'PUF panels',
                          'description' => 'igh-performance insulated panels for energy-efficient cold rooms and warehouses.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 11,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'dock-shelter-dock-leveler',
                          'description' => 'Reliable sealing & safe bridging for efficient cold chain loading operations.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 12,
                      'item' => [
                          '@type' => 'Product',
                          'name' => 'heavy-duty-racks',
                          'description' => 'trength storage systems for optimized space, safety, and throughput.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                ] 
          ]);

          $schemaServiceItemList = sr_schema_filter([
              '@context' => 'https://schema.org',
              '@type' => 'ItemList',
              '@id' => $siteUrl . '#service-item-list',
              'name' => 'Singhania Refrigeration Services',
              'description' => 'Cold storage, industrial refrigeration and cold chain services offered by Singhania Refrigeration across India.',
              'itemListElement' => [
                  [
                      '@type' => 'ListItem',
                      'position' => 1,
                      'item' => [
                          '@type' => 'Service',
                          'name' => 'Turnkey Solution',
                          'description' => 'Design and construction of turnkey cold storage facilities for food, pharma, dairy and logistics businesses.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 2,
                      'item' => [
                          '@type' => 'Service',
                          'name' => 'Segment Wise Solution',
                          'description' => 'Tailored refrigeration & cold-chain designs for every industry we serve.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 3,
                      'item' => [
                          '@type' => 'Service',
                          'name' => 'Ammonia and Freon Refrigeration Plants',
                          'description' => 'Industrial ammonia refrigeration and freon refrigeration plant solutions for cold storage applications.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 4,
                      'item' => [
                          '@type' => 'Service',
                          'name' => 'Quality Monitoring Solution',
                          'description' => 'End-to-end monitoring across warehouse & transport—temperature, humidity, shelf life, spoilage detection and root-cause analysis at every stage of the cold chain.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 5,
                      'item' => [
                          '@type' => 'Service',
                          'name' => 'Ware House Management System',
                          'description' => 'End-to-end WMS for cold chain—online bookings, inventory & pallet tracking, environment monitoring, real-time updates, and analytics.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 6,
                      'item' => [
                          '@type' => 'Service',
                          'name' => 'Transport Management System',
                          'description' => 'Plan routes, monitor environment, alert on deviations, and measure delivery performance & productivity end-to-end.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 7,
                      'item' => [
                          '@type' => 'Service',
                          'name' => 'Transport Refrigeration',
                          'description' => 'Refrigeration solutions for small & medium trucks and vans—fresh and frozen logistics with direct-drive, battery, split & monoblock options.',
                          'provider' => ['@id' => $siteUrl . '#organization'],
                          'areaServed' => 'IN',
                      ],
                  ],
              ],
          ]);

          $schemaFAQPage = sr_schema_filter([
              '@context' => 'https://schema.org',
              '@type' => 'FAQPage',
              '@id' => $schemaPageUrl . '#faq',
              'mainEntity' => [
                  [
                      '@type' => 'Question',
                      'name' => 'What services does Singhania Refrigeration offer?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'We offer turnkey cold storage construction, cold rooms and CA/MA stores, ammonia and freon refrigeration plants, IQF systems, ripening chambers, compressor rack systems, PUF panels, dock shelters, transport refrigeration and cold chain consulting.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'Where is Singhania Refrigeration located?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'Our office is at C-19, Okhla Phase-I, New Delhi – 110020. We serve clients across Delhi NCR — including Noida, Gurgaon and Faridabad — and execute projects pan-India.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'Which industries do you serve?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'We design cold storage and refrigeration systems for food processing, pharmaceuticals, dairy, agri-export and logistics businesses, with systems aligned to FSSAI and WHO-GMP standards.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'How experienced is the Singhania Refrigeration team?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'Our engineering team draws on 25 years of cold chain and logistics experience through the Singhania Group, delivering ammonia refrigeration, CA storage, IQF and transport refrigeration projects across India.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'How quickly will I hear back after submitting an enquiry?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'Our engineering team responds to all enquiries within 24 hours to discuss your cold storage or refrigeration requirements.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'What is controlled atmosphere storage?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'Controlled atmosphere (CA) storage is a cold storage method that regulates oxygen, carbon dioxide and humidity levels inside a sealed store, alongside temperature, to slow the ripening and respiration of fruits and vegetables. This extends shelf life far beyond standard refrigeration alone, making it the preferred storage format for agri-export businesses handling apples, pears and other long-storage produce.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'Ammonia vs freon refrigeration — which is better?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'Ammonia refrigeration plants are generally more energy-efficient and better suited to large-capacity industrial cold storage, but require stricter safety handling due to toxicity. Freon (HFC/HCFC) refrigeration systems are easier to maintain and commonly used in smaller cold rooms and retail cold storage. The right choice depends on capacity, budget and safety infrastructure.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'How does an IQF system work?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'An IQF (Individual Quick Freeze) machine rapidly freezes individual food items — such as seafood, fruit pieces or vegetables — using high-velocity cold air or cryogenic methods, so each piece freezes separately rather than clumping together. This locks in texture, nutrition and appearance, which is why IQF machine technology is the standard for export-quality frozen food production.',
                      ],
                  ],
                  [
                      '@type' => 'Question',
                      'name' => 'How can I reduce cold storage energy consumption?',
                      'acceptedAnswer' => [
                          '@type' => 'Answer',
                          'text' => 'Cold storage energy consumption can be reduced through high-efficiency compressors, properly sized PUF panel insulation, smart temperature controls, regular preventive maintenance and AMC services, and minimising door-opening losses with dock shelters and dock levelers. Singhania Refrigeration\'s energy-efficient refrigeration systems are engineered to cut running costs by up to 30% compared with conventional installations.',
                      ],
                  ],
              ],
          ]);

          /* Truck AC has its own visible FAQ; keep the homepage FAQ elsewhere. */
          if (strtolower($file) === 'truck-ac.php') {
            $schemaFAQPage = sr_schema_filter([
            '@context' => 'https://schema.org',
            '@type'    => 'FAQPage',
            '@id'      => $schemaPageUrl . '#faq',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name'  => 'What is a Truck AC?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'A Truck AC, also known as a Transport Refrigeration Unit (TRU), is a refrigeration system installed on commercial vehicles to maintain controlled temperatures during transportation of perishable and temperature-sensitive goods.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name'  => 'Which industries use Truck Refrigeration Units?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Truck refrigeration units are widely used in dairy, pharmaceutical logistics, frozen food transportation, fruits and vegetables distribution, meat and seafood logistics, and quick commerce deliveries.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name'  => 'What temperature range can truck refrigeration units maintain?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Depending on the application and refrigeration system, truck refrigeration units can typically maintain temperatures from +20°C to -25°C for safe transportation of various products.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name'  => 'Do you provide maintenance services?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Yes. Singhania Refrigeration provides preventive maintenance, AMC support, repairs, and nationwide after-sales service for transport refrigeration systems.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name'  => 'How much does a Truck AC unit cost?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'The cost depends on the vehicle type, refrigeration capacity, temperature requirements, and customization. Contact Singhania Refrigeration for a customized quotation.'
                    ]
                ]
            ]
            ]);
          }
        ?>
        
         
        <?php
          $schemaGraphItems = [
              $schemaOrganization,
              $schemaWebsite,
              $schemaPage,
              $schemaProductList,
              $schemaFAQPage,
          ];
          foreach ($schemaGraphItems as &$schemaGraphItem) {
              unset($schemaGraphItem['@context']);
          }
          unset($schemaGraphItem);
          $schemaGraph = [
              '@context' => 'https://schema.org',
              '@graph' => $schemaGraphItems,
          ];
        ?>
        <script type="application/ld+json">
<?php echo json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
        </script>
      
        <!-- favicon -->
        <link rel="apple-touch-icon" href="assets/images/logoS.png">
        <link rel="icon" type="image/png" href="assets/images/logoS.png">
        <link rel="shortcut icon" type="image/png" href="assets/images/logoS.png">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- font-awesome css -->
        <!-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"> -->
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css" media="print" onload="this.media='all'">
        <!-- aos css -->
        <link rel="stylesheet" type="text/css" href="assets/css/aos.css" media="print" onload="this.media='all'">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css" media="print" onload="this.media='all'">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css" media="print" onload="this.media='all'">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css" media="print" onload="this.media='all'">
        <!-- linea-font css -->
        <link rel="preload" href="assets/fonts/linea-fonts.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" type="text/css" href="assets/fonts/linea-fonts.css"></noscript>
        <!-- flaticon css  -->
        <link rel="preload" href="assets/fonts/flaticon.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css"></noscript>
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css" media="print" onload="this.media='all'">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="assets/css/rsmenu-main.css">
        <!-- nivo slider CSS -->
        <link rel="stylesheet" type="text/css" href="assets/inc/custom-slider/css/nivo-slider.css" media="print" onload="this.media='all'">
        <link rel="stylesheet" type="text/css" href="assets/inc/custom-slider/css/preview.css" media="print" onload="this.media='all'">
        <!-- rsmenu transitions css -->
        <link rel="preload" href="assets/css/rsmenu-transitions.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/rsmenu-transitions.css"></noscript>
        <!-- spacing css -->
        <link rel="preload" href="assets/css/rs-spacing.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css"></noscript>
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

        <link rel="preload"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        as="style" crossorigin="anonymous" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous"></noscript>
        <link rel="preload"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css"
        as="style" crossorigin="anonymous" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css"
        crossorigin="anonymous"></noscript>
        <style>
          .fa-brands.fa-x-twitter {
            display: inline-block;
            width: 1em;
            height: 1em;
            line-height: 1;
            vertical-align: -.08em;
          }

          .fa-brands.fa-x-twitter::before {
            content: "";
            display: block;
            width: 1em;
            height: 1em;
            background: currentColor;
            -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cpath d='M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9L389.2 48zm-24.8 373.8h39.1L151.1 88h-42l255.3 333.8z'/%3E%3C/svg%3E") center / contain no-repeat;
                    mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cpath d='M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9L389.2 48zm-24.8 373.8h39.1L151.1 88h-42l255.3 333.8z'/%3E%3C/svg%3E") center / contain no-repeat;
          }
        </style>
        
        <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>" />

        <!-- Performance hints -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- Modern, readable UI font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <!-- FOR MAPS TRUCK-AC -->
        <link rel="preload" href="https://unpkg.com/leaflet/dist/leaflet.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"></noscript>

        <!-- Shared inner-page hero entrance animation (matches the home hero) -->
        <style>
          .rs-breadcrumbs .content-part {
            transform-origin: 50% 100%;
            animation: srHeroFloatIn .8s ease .15s both;
          }

          /* The parent now owns the entrance animation, preventing a double jump. */
          .rs-breadcrumbs .content-part .hero-card {
            animation: none !important;
          }

          @keyframes srHeroFloatIn {
            from {
              opacity: 0;
              transform: translateY(22px) scale(.985);
            }
            to {
              opacity: 1;
              transform: translateY(0) scale(1);
            }
          }

          @media (prefers-reduced-motion: reduce) {
            .rs-breadcrumbs .content-part {
              animation: none;
            }
          }
        </style>
