<?php

include('admin/Class/function.php');
$obj = new adminBlog();

$getcategory = $obj->desplay_category();





?>


<!-- head section -->
<?php include_once('includes/head.php'); ?>

<body>

    <!-- preloader -->
    <?php include_once('includes/preloader.php'); ?>

    <!-- Header -->
    <?php include_once('includes/header.php'); ?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php include_once('includes/banner.php'); ?>
    <!-- Banner Ends Here -->

    <!-- Call to action -->
    <?php include_once('includes/calltoaction.php'); ?>


    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <!-- Blog Post -->
                <?php include_once('includes/blogpost.php'); ?>

                <!-- Sidebar -->
                <?php include_once('includes/sidebar.php'); ?>
            </div>
        </div>
    </section>

    <!-- Footer Area -->
    <?php include_once('includes/footer.php'); ?>

    <!-- Script file here -->
    <?php include_once('includes/script.php'); ?>