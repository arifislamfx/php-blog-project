<?php

include("Class/function.php");

$obj = new adminBlog();

session_start();
$id = $_SESSION['adminID'];

if ($id == null) {
    header("Location: index.php");
}

// admin Logout
if (isset($_GET['adminlogout'])) {
    if ($_GET['adminlogout'] == 'logout') {
        $obj->adminLogout();
    }
}

?>




<?php include_once('includes/head.php'); ?>

<body class="sb-nav-fixed">

    <!-- Top Navbar -->
    <?php include_once('includes/topnav.php'); ?>

    <div id="layoutSidenav">

        <!-- Side Navbar -->
        <?php include_once('includes/sidenav.php'); ?>

        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid">
                    <!-- All content here -->
                    <?php
                    if (isset($view)) {
                        if ($view == 'dashboard') {
                            include('view/dash_view.php');
                        } elseif ($view == 'add_category') {
                            include('view/add_cat_view.php');
                        } elseif ($view == 'add_post') {
                            include('view/add_post_view.php');
                        } elseif ($view == 'manage_category') {
                            include('view/manage_cat_view.php');
                        } elseif ($view == 'manage_post') {
                            include('view/manage_post_view.php');
                        } elseif ($view == 'edit_cat') {
                            include('view/cat_edit_view.php');
                        } elseif ($view == 'edit_img') {
                            include('view/edit_img_view.php');
                        }
                    }
                    ?>

                </div>
            </main>

            <!-- Footer  here -->
            <?php include_once('includes/footer.php'); ?>

        </div>
    </div>

    <!-- script section here -->
    <?php include_once('includes/script.php'); ?>
</body>

</html>