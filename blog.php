<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('head.php'); ?>
        <style>
            .blog-page-wrap {
                background: #f6f8ff;
                padding: 92px 0;
            }

            .blog-hero.rs-breadcrumbs {
                position: relative;
                background:
                    linear-gradient(90deg, rgba(6,18,38,.92) 0%, rgba(8,34,67,.78) 48%, rgba(8,34,67,.34) 100%),
                    url("assets/images/breadcrumbs/9.jpg") center/cover no-repeat;
                background-size: cover;
                background-position: center;
                isolation: isolate;
                overflow: hidden;
            }

            .blog-hero.rs-breadcrumbs::before {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,0) 42%);
                pointer-events:none;
                z-index: 0;
            }

            .blog-hero.rs-breadcrumbs::after {
                content:"";
                position:absolute;
                left:0;
                right:0;
                bottom:0;
                height:90px;
                /* background:linear-gradient(180deg, rgba(255,255,255,0), #ffffff); */
                pointer-events:none;
                z-index:0;
            }

            .blog-hero .content-part {
                position:relative;
                z-index:1;
                min-height: 560px;
                padding: 110px 0 130px;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                text-align: left;
            }

            .blog-hero-card {
                max-width: 720px;
                color: #fff;
            }

            .blog-hero-card .eyebrow {
                display: inline-flex;
                align-items:center;
                gap:8px;
                color: #dbe6ff;
                font-size: 12px;
                letter-spacing: .18em;
                text-transform: uppercase;
                background:rgba(255,255,255,.10);
                border:1px solid rgba(255,255,255,.16);
                border-radius:999px;
                padding:7px 11px;
                margin-bottom: 12px;
            }

            .blog-hero-card h1 {
                font-size:clamp(32px,4.8vw,56px);
                line-height:1.05;
                margin:0 0 16px;
                font-weight:900;
            }

            .blog-hero-card p {
                color: #e6ecff;
                max-width: 820px;
                margin: 0;
                font-size:17px;
                line-height: 1.78;
            }

            .hero-cta-actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:28px; }
            .hero-cta-btn { display:inline-flex; align-items:center; justify-content:center; min-height:56px; padding:0 20px; border:1px solid rgba(255,255,255,.48); border-radius:8px; background:rgba(255,255,255,.08); color:#fff !important; font-size:15px; font-weight:800; text-decoration:none; transition:background .2s ease,color .2s ease,transform .2s ease; }
            .hero-cta-btn:hover { background:#fff; color:#0e2344 !important; transform:translateY(-2px); }

            .blog-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 30px;
                align-items: stretch;
            }

            .blog-card {
                background: #fff;
                border: 1px solid #e7ecf5;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 12px 30px rgba(16, 28, 52, .08);
                height: 100%;
                display: flex;
                flex-direction: column;
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
                display: flex;
                flex: 1;
                flex-direction: column;
                min-height: 225px;
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
                min-height: 82px;
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
                margin-top: auto;
            }

            .blog-empty {
                background: #fff;
                border: 1px solid #e7ecf5;
                border-radius: 8px;
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
                    padding: 56px 0;
                }

                .blog-hero .content-part {
                    min-height: auto;
                    padding: 76px 0 92px;
                }

                .blog-hero-card h1 {
                    font-size:clamp(28px, 8vw, 36px);
                    line-height:1.18;
                }

                .blog-hero-card p {
                    font-size:15px;
                    line-height:1.7;
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
            <div class="rs-breadcrumbs bg-9 blog-hero">
                <div class="container">
                    <div class="content-part">
                        <div class="blog-hero-card">
                            <span class="eyebrow">Latest News</span>
                            <h1 class="breadcrumbs-title white-color mb-0">Blogs</h1>
                            <p>Cold storage, industrial refrigeration, energy efficiency and cold chain updates from the Singhania Refrigeration team.</p>
                            <div class="hero-cta-actions">
                                <a href="contact" class="hero-cta-btn">Get a Free Quote</a>
                                <a href="tel:+919971060822" class="hero-cta-btn">Call Now</a>
                            </div>
                        </div>
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
                                <p class="mb-0 mt-12">Practical guidance, project insights, and technology updates for reliable cold chain operations.</p>
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
