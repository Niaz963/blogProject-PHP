<?php
    Class adminblog{

        private $conn;

        public function __construct()
        {
            #database host,database user, database pass, database name

            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass ="";
            $dbname = 'blogproject';

            $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if(!$this->conn){
                die("Database Connection Error!!");
            }
            
        }


        public function admin_login($data){
            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);

            $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";

            if(mysqli_query($this->conn, $query)){
                $admin_info = mysqli_query($this->conn, $query);

                if($admin_info){
                    header("location:dashboard.php");
                    $admin_data = mysqli_fetch_assoc($admin_info);

                    session_start();
                    $_SESSION['adminID']= $admin_data['id'];
                    $_SESSION['adminID']= $admin_data['admin_name'];
                }
            }
        }

        public function adminLogout(){
            unset($_SESSION['adminID']);
            unset($_SESSION['admin_name']);
            header('location: index.php');
        }

        public function add_category($data){
            $cat_name = $data['cat_name'];
            $cat_des = $data['cat_des'];

            $query = "INSERT INTO category(cat_name,cat_des) VALUE('$cat_name','$cat_des')";

            if(mysqli_query($this->conn, $query)){
                return "Category Added Successfully!";
            }
        }


        public function display_category(){
            $query = "SELECT * FROM category";

            if(mysqli_query($this->conn, $query)){
               $category = mysqli_query($this->conn, $query);
               return $category; 
            }
        }

        public function delete_category($id){
            $query = "DELETE FROM category WHERE cat_id=$id";

            if(mysqli_query($this->conn, $query)){
                return "Category Deleted Successfully!";
            }
        }
		
		   public function get_editCat_info($id){
            $query = "SELECT * FROM category WHERE cat_id=$id";

            if(mysqli_query($this->conn, $query)){
                $cat_info = mysqli_query($this->conn, $query);
                $category = mysqli_fetch_assoc($cat_info);
                return $category;
            }
        }
		
		
        public function update_category($data){
            $categ_name = $data['category_name'];
            $categ_des =$data['cat_descript'];
            $categ_id = $data['edit_cat_id'];

            $query = "UPDATE category SET cat_name='$categ_name',cat_des='$categ_des' WHERE cat_id=$categ_id";

            if(mysqli_query($this->conn, $query)){
                return "Post Updated Successfully!";
            }
        }



        public function add_post($data){
            $post_title = $data['post_title'];
            $post_content = $data['post_content'];
            $post_img = $_FILES['post_img']['name'];
            $post_img_tmp = $_FILES['post_img']['tmp_name'];
            $post_category =$data['post_category'];
            $post_summery = $data['post_summery'];
            $post_tag = $data['post_tag'];
            $post_status = $data['post_status'];

            $query ="INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summery,post_tag,post_status) VALUES('$post_title','$post_content','$post_img',$post_category,'Admin',now(),3,'$post_summery','$post_tag',$post_status)";

            if(mysqli_query($this->conn,$query)){
                move_uploaded_file($post_img_tmp,'../upload/'.$post_img);
                return "Post Added Successfully!";
            }
        }

        public function display_post(){
            $query = "SELECT * FROM post_with_ctg";
            if(mysqli_query($this->conn, $query)){
                $posts = mysqli_query($this->conn, $query);
                return $posts;
            }
        }


        public function display_post_public(){
            $query = "SELECT * FROM post_with_ctg WHERE post_status=1";
            if(mysqli_query($this->conn, $query)){
                $posts = mysqli_query($this->conn, $query);
                return $posts;
            }
        }


        public function edit_img($data){
            $id = $data['editimg_id'];
            $imgname = $_FILES['change_img']['name'];
            $tmp_name = $_FILES['change_img']['tmp_name'];

            $query = "UPDATE posts SET post_img='$imgname' WHERE post_id=$id";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name,'../upload/'.$imgname);
                return "Thumbnail Update Successfully!";
            }

        }


        public function get_post_info($id){
            $query = "SELECT * FROM post_with_ctg WHERE post_id=$id";

            if(mysqli_query($this->conn, $query)){
                $post_info = mysqli_query($this->conn, $query);
                $post = mysqli_fetch_assoc($post_info);
                return $post;
            }
        }


        public function update_post($data){
            $post_title = $data['change_title'];
            $post_content =$data['change_content'];
            $post_id = $data['edit_post_id'];

            $query = "UPDATE posts SET post_title='$post_title',post_content='$post_content' WHERE post_id=$post_id";

            if(mysqli_query($this->conn, $query)){
                return "Post Updated Successfully!";
            }
        }


        public function delete_post($id){

            $catch_post_img = "SELECT * FROM posts WHERE post_id=$id";
            $delete_std_post = mysqli_query($this->conn, $catch_post_img);
            $std_postdel = mysqli_fetch_assoc($delete_std_post);
            $deleteImg_post = $std_postdel['post_img'];

            $query = "DELETE FROM posts WHERE post_id=$id";

            if(mysqli_query($this->conn, $query)){
                unlink('../upload/'.$deleteImg_post);              
                return "Post Deleted Successfully!";
                
            }
        }
		
		
		  public function product_by_category($id){
            $query = "SELECT * FROM post_with_ctg WHERE cat_id=$id";

            if(mysqli_query($this->conn, $query)){
                $pro_info = mysqli_query($this->conn, $query);
                
                return  $pro_info;
            }
        }
		

    }
?>