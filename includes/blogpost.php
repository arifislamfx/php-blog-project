<?php

$posts = $obj->display_post_public();

?>



<div class="col-lg-8">
    <div class="all-blog-posts">
        <div class="row">
            <?php while ($postdata = mysqli_fetch_assoc($posts)) { ?>
                <div class="col-lg-12">
                    <div class="blog-post">
                        <div style="max-width:100%; height:auto; object-fit:contain; " class="blog-thumb img-fluid">
                            <img class="img-fluid img-thumbnail" alt="thumbnil" src="upload/<?php echo $postdata['post_img']; ?>">
                        </div>
                        <div class="down-content">
                            <span><?php echo $postdata['cat_name']; ?></span>
                            <a href="post_details.php?view=postview&&id=<?php echo $postdata['post_id']; ?>">
                                <h4><?php echo $postdata['post_title']; ?></h4>
                            </a>

                            <ul class="post-info">
                                <li><a href="#"><?php echo $postdata['post_author']; ?></a></li>
                                <li><?php echo $postdata['post_date']; ?></li>
                                <li><a href="#"><?php echo $postdata['post_comment_count']; ?></a></li>
                            </ul>
                            <p><?php echo $postdata['post_summary']; ?></p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-6">
                                        <?php echo $postdata['post_tag']; ?>
                                    </div>
                                    <div class="col-6">
                                        <ul class="post-share">
                                            <li><i class="fa fa-share-alt"></i></li>
                                            <li><a href="#">Facebook</a>,</li>
                                            <li><a href="#"> Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>