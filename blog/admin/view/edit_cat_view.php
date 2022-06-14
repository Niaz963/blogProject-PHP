
<?php
	if(isset($_GET['status'])){
		if($_GET['status']='editcat'){
			$id=$_GET['id'];
			$catdata=$obj->get_editCat_info($id);
		}
	}
	
	if(isset($_POST['update_cat'])){
		$msg=$obj->update_category($_POST);
	}
?>


<div class="shadow m-5 p-5">

    <?php if(isset($msg)){echo $msg;}?>

    <form action="" method="POST" class="form">

    <input type="hidden" name="edit_cat_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="category_name">Category Name</label><br>
            <input value="<?php echo $catdata['cat_name'];?>" class="form-control" name="category_name" class="py-4" id="category_name" type="text"/>
        </div>
		
		 <div class="form-group">
            <label class="mb-1" for="cat_descript">Category Name</label><br>
			<textarea  class="form-control" name="cat_descript" id="cat_descript" cols="30" rows="10" ><?php echo $catdata['cat_des'];?></textarea>
           
        </div>

        <input type="submit" value="Update Category" name="update_cat" class="btn btn-primary">

    </form>

</div>