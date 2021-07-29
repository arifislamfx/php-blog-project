<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'editimg') {
        $id = $_GET['id'];
    }
}

if (isset($_POST['change_img_btn'])) {
    $editimgmsg = $obj->update_edit_img($_POST);
}

?>

<div class="shadow m-5 p-5">
    <?php if (isset($editimgmsg)) {
        echo $editimgmsg;
    } ?>
    <form class="form" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="editimg_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="change_img">Change Thumbnail</label> <br>
            <input name="change_img" class=" py-4" id="change_img" type="file" />
        </div>
        <input name="change_img_btn" class="btn btn-primary " type="submit" value="Update Thumbnail">
    </form>
</div>