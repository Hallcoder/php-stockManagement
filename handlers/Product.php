<?php
require_once ("database.php");
class Product
{

    public $db;
    public $id;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Get all posts
    public function getProducts()
    {
        $this->db->query("SELECT * FROM products");
        return $this->db->resultSet();
    }

    //GET One Post
    function getProductsById($id)
    {
        $this->db->query("SELECT * FROM products WHERE id=:id");

        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Inserting into Records
    public function addProducts()
    {
        if (isset($_POST['submit'])) {
            $products = $_POST['product'];
            $brand = $_POST['brand'];
            $phone = $_POST['phone'];
            $supplier = $_POST['supplier'];
            $date= $_POST['date'];

            $this->db->query("INSERT INTO products(product_Name, brand, supplier_phone, supplier, added_date) VALUES (:Name , :Brand, :Phone, :Supplier, :Added)");
            $this->db->bind(':Name', $products);
            $this->db->bind(':Brand', $brand);
            $this->db->bind(':Phone', $phone);
            $this->db->bind(':Supplier', $supplier);
            $this->db->bind(':Added', $date);

            if ($this->db->execute()) {
//                return true;
                header('location: ../ui/ReadProducts.php');
            } else {
                return false;
            }
        }
    }

    //UPDATING RECORDS
    function updateProducts()
    {
        $this->id=$_GET['id'];
        if (isset($_POST['submit'])) {
            $products = $_POST['product'];
            $brand = $_POST['brand'];
            $phone = $_POST['phone'];
            $supplier = $_POST['supplier'];
            $date = $_POST['date'];

            $this->db->query("UPDATE products SET product_Name= :Name, brand=:Brand, supplier_phone=:Phone, supplier=:Supplier, added_date=:Added WHERE productId = :id");
            $this->db->bind(':id', $this->id);
            $this->db->bind(':Name', $products);
            $this->db->bind(':Brand', $brand);
            $this->db->bind(':Phone', $phone);
            $this->db->bind(':Supplier', $supplier);
            $this->db->bind(':Added', $date);

            if ($this->db->execute()) {
                header('location:../ui/ReadProducts.php');
            } else {
                return false;
            }
        }
    }

    //DELETING RECORDS
    function deleteProduct()
    {
        $this->id=$_GET['id'];
        $this->db->query("DELETE FROM products WHERE productId = :id");

        $this->db->bind(':id', $this->id);

        if ($this->db->execute()) {
            header('location:../ui/ReadProducts.php');
        } else {
            return false;

        }
    }
}
