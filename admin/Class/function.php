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
}
