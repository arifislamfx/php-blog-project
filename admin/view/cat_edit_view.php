<?php

$catdata = $obj->desplay_category();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'edit') {
        $id = $_GET['id'];
        $returnData = $obj->display_data_by_id($id);
    }
}

if (isset($_POST['update_cat'])) {
    $msg = $obj->update_data($_POST);
}



?>


<form class="form mt-3" action="" method="POST">

    <?php if (isset($msg)) {
        echo $msg;
    } ?>

    <input type="text" class="form-control mb-2" name="u_cat_name" value="<?php echo $returnData['cat_name']; ?>">
    <input type="text" class="form-control mb-2" name="u_cat_des" value="<?php echo $returnData['cat_des']; ?>">

    <input type="hidden" name="id" value="<?php echo $returnData['cat_id']; ?>">

    <input type="submit" class="btn btn-success" name="update_cat" value="Update Category">

</form>