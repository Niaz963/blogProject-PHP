
<?php


    $tagclouds= $obj->display_post();  
    
?>

<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
          <?php include_once("search.php") ?> 
          
          <?php include_once("recent_post.php") ?>

          <?php include_once("category.php") ?>



            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                        <ul>

                        <?php 
                        while($tagcloud=mysqli_fetch_assoc($tagclouds)){
                        ?>
                            <li><a href="#"><?php echo $tagcloud['post_tag'];?></a></li>
                            

                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>