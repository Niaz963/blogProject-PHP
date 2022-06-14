<?php


    $getRecent= $obj->display_post();  
	
	
    
?>

<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
        <div class="sidebar-heading">
            <h2>Recent Posts</h2>
        </div>
        <div class="content">
            <ul>


                    <?php 
                        while($recentPost=mysqli_fetch_assoc($getRecent)){
                    ?>

                <li><a href="single_post.php?view=postview&&id=<?php echo $recentPost['post_id']; ?>">
                        <h5><?php echo $recentPost['post_title']; ?></h5>
                        <span><?php echo $recentPost['post_date']; ?></span>
                    </a></li>


                    <?php } ?>


            </ul>
        </div>
    </div>
</div>