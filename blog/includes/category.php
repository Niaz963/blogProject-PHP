<?php


    $get= $obj->display_category();  
    
?>

<div class="col-lg-12">
    <div class="sidebar-item categories">
        <div class="sidebar-heading">
            <h2>Categories</h2>
        </div>
        <div class="content">
            <ul>

                <?php 
                     while($categoryB=mysqli_fetch_assoc($get)){
                 ?>

                <li>
                    <a href="categoryWise_post.php?view=catview&&id=<?php echo $categoryB['cat_id']; ?>">
                        <?php echo $categoryB['cat_name'];?>
                    </a>
                </li>



                <?php } ?>


            </ul>
        </div>
    </div>
</div>