<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'editpost') {
        $id = $_GET['id'];
        $postdata = $obj->get_post_info($id);
    }
}

if (isset($_POST['change_post_btn'])) {
    $editpostmsg = $obj->update_edit_post($_POST);
}

?>

<div class="shadow m-5 p-5">
    <?php if (isset($editpostmsg)) {
        echo $editpostmsg;
    } ?>
    <form class="form" action="" method="POST">
        <input type="hidden" name="editpost_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="change_title">Change Title</label> <br>
            <input value="<?php echo $postdata['post_title']; ?>" name="change_title" class="form-control py-4" id="change_title" type="text" />
        </div>
        <div class="form-group">
            <label class="mb-1" for="change_content">Change Content</label> <br>
            <textarea cols="30" rows="10" name="change_content" class="form-control py-4" id="change_content"> <?php echo $postdata['post_content']; ?> </textarea>
        </div>
        <input name="change_post_btn" class="btn btn-primary " type="submit" value="Update Post">
    </form>
</div>