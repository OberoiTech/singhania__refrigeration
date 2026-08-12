<?php
include('admin/config.php');
include('blog-slug-helper.php');

$slug = isset($_GET['slug']) ? sr_slugify($_GET['slug']) : '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$selectFields = "c.id AS cate_id, c.category_name, b.id AS id, b.image AS image, b.created_at AS created_at, b.title, b.author, b.description, b.meta_title, b.meta_description, b.keywords, b.thumb_image";
$blogSlugMap = sr_blog_slug_map($conn);

if ($slug !== '') {
    $matchedId = array_search($slug, $blogSlugMap, true);
    $blog = null;
    if ($matchedId !== false) {
        $blogs = mysqli_query($conn, "SELECT $selectFields FROM category c JOIN blogs b ON b.cate_id = c.id WHERE b.id = $matchedId");
        $blog = $blogs ? mysqli_fetch_assoc($blogs) : null;
        if ($blog) {
            $blog['slug'] = $slug;
        }
    }
} elseif ($id > 0) {
    // Legacy ?id= links: look up the post and 301 to its canonical /blog/<slug> URL.
    $blogs = mysqli_query($conn, "SELECT $selectFields FROM category c JOIN blogs b ON b.cate_id = c.id WHERE b.id = $id");
    $blog = $blogs ? mysqli_fetch_assoc($blogs) : null;

    if ($blog && isset($blogSlugMap[$blog['id']])) {
        header('Location: https://singhaniarefrigeration.com/blog/' . $blogSlugMap[$blog['id']], true, 301);
        exit;
    }
} else {
    $blog = null;
}

if (!$blog) {
    http_response_code(404);
    $blog = [
        'id' => 0,
        'cate_id' => 0,
        'category_name' => '',
        'slug' => '',
        'image' => '',
        'created_at' => '',
        'title' => 'Blog not found',
        'author' => 'Singhania',
        'description' => 'The requested blog post could not be found.',
        'meta_title' => '',
        'meta_description' => '',
        'keywords' => '',
        'thumb_image' => '',
    ];
}

$plainDescription = $blog ? trim(preg_replace('/\s+/', ' ', strip_tags($blog['description']))) : '';
$fallbackDescription = $plainDescription !== '' ? substr($plainDescription, 0, 160) : 'Read the latest update from Singhania Refrigeration.';
$pageTitle = !empty($blog['meta_title']) ? $blog['meta_title'] : (!empty($blog['title']) ? $blog['title'] . ' | Singhania Refrigeration' : 'Blog Details | Singhania Refrigeration');
$pageDescription = !empty($blog['meta_description']) ? $blog['meta_description'] : $fallbackDescription;
$pageKeywords = !empty($blog['keywords']) ? $blog['keywords'] : 'cold storage solutions, refrigeration blog, Singhania Refrigeration';
 $canonicalUrl = !empty($blog['slug'])
     ? 'https://singhaniarefrigeration.com/blog/' . $blog['slug']
     : 'https://singhaniarefrigeration.com/blog-details?id=' . $id;
$shareImage = !empty($blog['thumb_image']) ? 'https://singhaniarefrigeration.com/admin/uploads/' . $blog['thumb_image'] : 'https://singhaniarefrigeration.com/admin/uploads/image.jpg';

if (!empty($blog['id'])) {
    $schemaBreadcrumbItems = [
        ['name' => 'Home', 'url' => 'https://singhaniarefrigeration.com/'],
        ['name' => 'Blog', 'url' => 'https://singhaniarefrigeration.com/blog'],
        ['name' => $blog['title'], 'url' => $canonicalUrl],
    ];
}
$ogType = 'article';

$schemaBlogPosting = null;
if (!empty($blog['id'])) {
    $blogDate = !empty($blog['created_at']) ? date('c', strtotime($blog['created_at'])) : null;
    $schemaBlogPosting = [
        'headline' => $blog['title'],
        'description' => $pageDescription,
        'image' => $shareImage,
        'authorName' => !empty($blog['author']) ? $blog['author'] : 'Singhania Refrigeration',
        'datePublished' => $blogDate,
        'dateModified' => $blogDate,
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('head.php');?>
    </head>
    <body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XNG3TQC" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <?php include('header.php'); ?>
		<!-- Main content Start -->
        <div class="main-content">
            <!-- Breadcrumbs Section Start -->
            <div class="rs-breadcrumbs bg-9">
                <div class="container">
                    <div class="content-part text-center">
                        <h1 class="breadcrumbs-title white-color mb-0"><?php echo $blog['title'];?></h1>
                    </div>
                </div>
            </div>
            <!-- Breadcrumbs Section End -->
            <!-- Blog Section Start -->
            <div class="rs-blog inner single pt-100 pb-100 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-part">
                                <div class="blog-img">
                                    <img src="<?php echo "admin/uploads/" . $blog['thumb_image']; ?>" alt="<?php echo htmlspecialchars(!empty($blog['title']) ? $blog['title'] : 'Blog post image', ENT_QUOTES); ?>">
                                </div>
                                <div class="article-content shadow mb-60">
                                    <ul class="blog-meta mb-22">
                                        <li><i class="fa fa-calendar-check-o"></i> <?php echo $blog['created_at'];?></li>
                                        <li><i class="fa fa-user-o"></i> <?php echo htmlspecialchars(!empty($blog['author']) ? $blog['author'] : 'Singhania', ENT_QUOTES, 'UTF-8'); ?></li>
                                        <li><i class="fa fa-book"></i> <a href="blog" aria-label="Browse <?php echo htmlspecialchars($blog['category_name'], ENT_QUOTES, 'UTF-8'); ?> articles"><?php echo htmlspecialchars($blog['category_name'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                                        <!-- <li><i class="fa fa-comments-o"></i> 10</li> -->
                                    </ul>
                                    <p class="desc mb-35"><?php echo $blog['description'];?></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 md-mb-50 pl-35 lg-pl-15 md-order-first">
                            <div id="sticky-sidebar" class="blog-sidebar">
                                <div class="sidebar-popular-post sidebar-grid shadow mb-50">
                                    <div class="sidebar-title">
                                       <h3 class="title mb-20">Recent Post</h3>
                                    </div>
                                    <?php $blogs = mysqli_query($conn,"SELECT c.id AS cate_id, c.category_name, b.id AS id, b.image AS image , b.created_at AS created_at,b.title,b.author,b.description,b.thumb_image FROM category c JOIN blogs b ON b.cate_id = c.id");
                                        while($blog = mysqli_fetch_assoc($blogs)){
                                            $recentBlogUrl = 'blog/' . ($blogSlugMap[(int)$blog['id']] ?? sr_slugify($blog['title']));
                                        ?>
                                    <div class="single-post mb-20">
                                        <div class="post-image">
                                            <a href="<?php echo htmlspecialchars($recentBlogUrl, ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo "admin/uploads/" . $blog['image']; ?>" alt="<?php echo htmlspecialchars(!empty($blog['title']) ? $blog['title'] : 'Recent blog post', ENT_QUOTES); ?>"></a>
                                        </div>
                                        <div class="post-desc">
                                            <div class="post-title">
                                                <h5 class="margin-0"><a href="<?php echo htmlspecialchars($recentBlogUrl, ENT_QUOTES, 'UTF-8'); ?>"><?php echo $blog['title']; ?> </a></h5>
                                            </div>
                                            <ul>
                                                <li><i class="fa fa-calendar"></i> <?php echo $blog['created_at']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- <div class="single-post mb-20">
                                        <div class="post-image">
                                            <a href="blog-single.html"><img src="assets/images/blog/small/2.jpg" alt="post image"></a>
                                        </div>
                                        <div class="post-desc">
                                            <div class="post-title">
                                                <h5 class="margin-0"><a href="blog-single.html">Covid-19 threatens the next generation of smartphones </a></h5>
                                            </div>
                                            <ul>
                                                <li><i class="fa fa-calendar"></i> 28 June, 2019</li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    
                                </div>

                                <!--<div class="sidebar-categories sidebar-grid shadow">-->
                                    <!--<div class="sidebar-title">-->
                                       <!--<h3 class="title mb-20">Categories</h3>-->
                                    <!--</div>-->
                                    
                                    <!--<ul>    -->
                                        <?php 
                                        // $record = mysqli_query($conn,"select * from category");
                                            // while($row = mysqli_fetch_assoc($record)){ 
                                            ?>                                
                                        <!--<li><a href="#"><?php echo $row['category_name'];?></a></li> -->
                                        <?php //} ?>
                                        
                                <!--    </ul>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    <div id="sticky-end"></div>
                </div>
            </div>
            <!-- Blog Section End -->
        </div> 
        <!-- Main content End -->

        <!-- Footer Start -->
        <?php include('footer.php');?>
    </body>
</html>
