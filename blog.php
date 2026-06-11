<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include('head.php'); ?>
        <style>
            .blog-page-wrap {
                background: #f6f8ff;
                padding: 90px 0;
            }

            .blog-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 30px;
            }

            .blog-card {
                background: #fff;
                border: 1px solid #e7ecf5;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 12px 30px rgba(16, 28, 52, .08);
                height: 100%;
            }

            .blog-card__image {
                position: relative;
                display: block;
                aspect-ratio: 16 / 10;
                overflow: hidden;
                background: #eef2ff;
            }

            .blog-card__image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
                transition: transform .35s ease;
            }

            .blog-card:hover .blog-card__image img {
                transform: scale(1.04);
            }

            .blog-card__body {
                padding: 20px;
            }

            .blog-card__cat {
                display: inline-block;
                margin-bottom: 10px;
                color: #1f3b86;
                font-size: 12px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .08em;
            }

            .blog-card__title {
                font-size: 20px;
                line-height: 1.35;
                margin: 0 0 12px;
            }

            .blog-card__title a {
                color: #0f2442;
                text-decoration: none;
            }

            .blog-card__title a:hover {
                color: #1f3b86;
            }

            .blog-card__meta {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                color: #667085;
                font-size: 13px;
            }

            .blog-empty {
                background: #fff;
                border: 1px solid #e7ecf5;
                border-radius: 12px;
                padding: 28px;
                color: #667085;
                box-shadow: 0 12px 30px rgba(16, 28, 52, .08);
            }

            @media (max-width: 991px) {
                .blog-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }
            }

            @media (max-width: 575px) {
                .blog-page-wrap {
                    padding: 64px 0;
                }

                .blog-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <?php include('header.php'); ?>

        <div class="main-content">
            <div class="rs-breadcrumbs bg-9">
                <div class="container">
                    <div class="content-part text-center">
                        <h1 class="breadcrumbs-title white-color mb-0">Blogs</h1>
                    </div>
                </div>
            </div>

            <section class="blog-page-wrap">
                <div class="container">
                    <div class="row y-middle mb-40 sm-mb-40">
                        <div class="col-md-6 sm-mb-22">
                            <div class="sec-title">
                                <span class="sub-title primary right-line">LATEST NEWS</span>
                                <h2 class="title mb-0">Read Latest Updates</h2>
                            </div>
                        </div>
                    </div>

                    <?php
                    $record = mysqli_query($conn, "SELECT c.id AS cate_id, c.category_name, b.id AS id, b.image AS image, b.created_at AS created_at, b.title, b.author
                                                   FROM category c
                                                   JOIN blogs b ON b.cate_id = c.id
                                                   ORDER BY b.created_at DESC, b.id DESC");
                    ?>

                    <?php if ($record && mysqli_num_rows($record) > 0) { ?>
                    <div class="blog-grid">
                        <?php while ($row = mysqli_fetch_assoc($record)) {
                            $blogUrl = 'blog-details.php?id=' . (int)$row['id'];
                            $image = !empty($row['image']) ? 'admin/uploads/' . $row['image'] : 'assets/images/blog/1.jpg';
                            $author = !empty($row['author']) ? $row['author'] : 'Singhania';
                        ?>
                        <article class="blog-card">
                            <a class="blog-card__image" href="<?php echo $blogUrl; ?>">
                                <img loading="lazy"
                                     decoding="async"
                                     src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>"
                                     alt="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>">
                            </a>
                            <div class="blog-card__body">
                                <a class="blog-card__cat" href="<?php echo $blogUrl; ?>">
                                    <?php echo htmlspecialchars($row['category_name'], ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                                <h3 class="blog-card__title">
                                    <a href="<?php echo $blogUrl; ?>">
                                        <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </h3>
                                <div class="blog-card__meta">
                                    <span><i class="fa fa-user-o"></i> <?php echo htmlspecialchars($author, ENT_QUOTES, 'UTF-8'); ?></span>
                                    <span><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                    <?php } else { ?>
                    <div class="blog-empty">
                        No blog posts found.
                    </div>
                    <?php } ?>
                </div>
            </section>
        </div>

        <?php include('footer.php'); ?>
    </body>
</html>
