<?php

include('admin/Class/function.php');
$obj = new adminBlog();

$getcategory = $obj->desplay_category();

if (isset($_GET['view'])) {
    if ($_GET['view'] = 'postview') {
        $id = $_GET['id'];
        $post_details = $obj->get_post_info($id);
    }
}





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
                <div class="col-lg-8">
                    <div style="max-width:100%; height:auto; object-fit:contain; " class="blog-thumb img-fluid">
                        <img class="img-fluid img-thumbnail" alt="thumbnil" src="upload/<?php echo $post_details['post_img']; ?>">
                    </div>
                    <h2> <?php echo $post_details['post_title']; ?> </h2>
                    <p> <?php echo $post_details['post_content']; ?> </p>
                </div>

                <!-- Sidebar -->
                <?php include_once('includes/sidebar.php'); ?>
            </div>
        </div>
    </section>

    <!-- Footer Area -->
    <?php include_once('includes/footer.php'); ?>

    <!-- Script file here -->
    <?php include_once('includes/script.php'); ?>