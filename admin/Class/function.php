<?php

class adminBlog
{
    private $conn;

    public function __construct()
    {
        // connect with db
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'blog_project';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Database connection failed!");
        }
    }

    // admin login
    public function admin_login($data)
    {
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);

        $query = "SELECT * FROM admin_info WHERE admin_email = '$admin_email' && admin_pass = '$admin_pass'";

        if (mysqli_query($this->conn, $query)) {
            $admin_info = mysqli_query($this->conn, $query);

            if ($admin_info) {
                header("Location:dashboard.php");
                $admin_data = mysqli_fetch_assoc($admin_info);

                session_start();
                $_SESSION['adminID'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
            }
        }
    }

    // logout
    public function adminLogout()
    {
        unset($_SESSION['adminID']);
        unset($_SESSION['admin_name']);
        header('Location: index.php');
    }

    // add category page
    public function add_category($data)
    {
        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $query = "INSERT INTO category(cat_name, cat_des) VALUE ('$cat_name', '$cat_des' )";

        if (mysqli_query($this->conn, $query)) {
            return "Category added successfully";
        }
    }

    // desplay category in manage category page
    public function desplay_category()
    {
        $query = "SELECT * FROM category";
        if (mysqli_query($this->conn, $query)) {
            $category = mysqli_query($this->conn, $query);
            return $category;
        }
    }

    // display data by id
    public function display_data_by_id($id)
    {
        $query = "SELECT * FROM category WHERE cat_id = $id";

        if (mysqli_query($this->conn, $query)) {
            $returndata = mysqli_query($this->conn, $query);
            $catData = mysqli_fetch_assoc($returndata);
            return $catData;
        }
    }

    // update data 
    public function update_data($data)
    {
        $cat_name_u = $data['u_cat_name'];
        $cat_des_u = $data['u_cat_des'];
        $idNo = $data['id'];

        $query = "UPDATE category SET cat_name = '$cat_name_u', cat_des = '$cat_des_u' WHERE cat_id=$idNo";

        if (mysqli_query($this->conn, $query)) {
            return "Information Updated Successfully!";
        }
    }


    // delete category items
    public function delete_category($id)
    {
        $query = "DELETE FROM category WHERE cat_id = $id";
        if (mysqli_query($this->conn, $query)) {
            return "Category deleted successfully.";
        }
    }

    // Add Post
    public function add_post($data)
    {
        $post_title = $data['post_title'];
        $post_content = $data['post_content'];
        $post_img = $_FILES['post_img']['name'];
        $post_img_tmp = $_FILES['post_img']['tmp_name'];
        $post_category = $data['post_category'];
        $post_summary = $data['post_summary'];
        $post_tag = $data['post_tag'];
        $post_status = $data['post_status'];

        $query = "INSERT INTO posts(post_title, post_content, post_img, post_ctg, post_author,post_date, post_comment_count, post_summary, post_tag, post_status) VALUES('$post_title', '$post_content', '$post_img', $post_category, 'Admin', now(), 3, '$post_summary', '$post_tag', $post_status)";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($post_img_tmp, '../upload/' . $post_img);
            return "Post added successfully";
        }
    }

    // display post
    public function display_post()
    {
        $query = "SELECT * FROM post_with_ctg";
        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    // display published post
    public function display_post_public()
    {
        $query = "SELECT * FROM post_with_ctg WHERE post_status=1";
        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    // edit img update
    public function update_edit_img($data)
    {
        $id = $data['editimg_id'];
        $imgname = $_FILES['change_img']['name'];
        $tmp_name = $_FILES['change_img']['tmp_name'];

        $query = "UPDATE posts SET post_img='$imgname' WHERE post_id=$id";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmp_name, '../upload/' . $imgname);
            return "Thumbnail update successfully.";
        }
    }


    // edit post get post info first
    public function get_post_info($id)
    {
        $query = "SELECT * FROM post_with_ctg WHERE post_id = $id";
        if (mysqli_query($this->conn, $query)) {
            $post_info = mysqli_query($this->conn, $query);
            $post = mysqli_fetch_assoc($post_info);
            return $post;
        }
    }


    //edit post update
    public function update_edit_post($data)
    {
        $post_id = $data['editpost_id'];
        $post_title = $data['change_title'];
        $post_content = $data['change_content'];

        $query = "UPDATE posts SET post_title='$post_title', post_content='$post_content' WHERE post_id = $post_id";

        if (mysqli_query($this->conn, $query)) {
            return "Post Updated successfully.";
        }
    }
}
