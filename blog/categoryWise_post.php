<?php
    include("admin/Class/function.php");

    $obj = new adminblog();

    $getcat = $obj->display_category();

    if(isset($_GET['view'])){
		 
        if($_GET['view']=='catview'){
           $id =$_GET['id'];
            $prodata = $obj->product_by_category($id);
			
			  $pros = array();
				while($prodatas = mysqli_fetch_assoc($prodata)){
				$pros[] =  $prodatas;
			}
        
        
        }
    }
    
?>


<?php include_once("includes/head.php") ?>

<body>

    <!-- ***** Preloader Start ***** -->

    <?php include_once("includes/preloader.php") ?>

    <!-- ***** Preloader End ***** -->

    <?php include_once("includes/header.php")?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php include_once("includes/banner.php")?>
    <!-- Banner Ends Here -->

    <?php include_once("includes/cta.php")?>


    <section class="blog-posts">
        <div class="container">
            <div class="row">
			
			
                <div class="col-lg-8">
				
				 <?php foreach($pros as $pro){  ?>

                               
                   <img height="400px" src="upload/<?php echo $pro['post_img']; ?>" alt="">
                   <h2><?php echo $pro['post_title']; ?></h2>
                   <p><?php echo $pro['post_content']; ?></p>
                   <p><?php echo $pro['post_summery']; ?></p>
				   
				    <?php } ?>
					
					
					     
                </div>
				
		
					
						

                <?php include_once("includes/sidebar.php")?>

            </div>
        </div>
    </section>


    <?php include_once("includes/footer.php"); ?>

    <?php include_once("includes/script.php"); ?>