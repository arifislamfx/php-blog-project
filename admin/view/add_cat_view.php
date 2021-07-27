<?php

if (isset($_POST['add_cat'])) {
    $retutn_msg = $obj->add_category($_POST);
}




?>



<h2>This is add category page.</h2>
<form action="" method="POST">

    <?php if (isset($retutn_msg)) {
        echo $retutn_msg;
    } ?>

    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input name="cat_name" class="form-control py-4" id="cat_name" type="text" />
    </div>

    <div class="form-group">
        <label class="mb-1" for="cat_des">Category Description </label>
        <input name="cat_des" class="form-control py-4" id="cat_des" type="text" />
    </div>

    <input name="add_cat" class="form-control btn btn-block btn-primary " type="submit" value="Add Category">

</form>