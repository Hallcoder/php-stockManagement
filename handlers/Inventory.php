<?php
require_once ("database.php");
class Inventory
{
    public $db;
    public $id;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Get all posts
    public function getInventory(){
        $this->db->query("SELECT * FROM stk_inventory");
        return $this->db->resultSet();
    }

    //GET One Post
    public function getInventoryId(){
        $this->id=$_GET['id'];
        $this->db->query("SELECT * FROM stk_inventory WHERE inventory_id =:id");

        $this->db->bind(':id', $this->id);
        return $this->db->single();
    }

    // Inserting into Records
    public function addInventory(){
        if(isset($_POST['submit'])) {
            $id = $_POST['productId'];
            $quantity = $_POST['quantity'];
            $date= $_POST['date'];
            $this->db->query("INSERT INTO stk_inventory(quantity,productId, added_date) VALUES (:quantity, :pId ,:added_date)");
            $this->db->bind(':pId', $id);
            $this->db->bind(':quantity', $quantity);
            $this->db->bind(':added_date', $date);


            if($this->db->execute()){
//            return true;
                header('location:../ui/ReadInventory.php');
            }else{
                return false;
            }
        }
    }

    //UPDATING RECORDS
    public function updateInventory()
    {
        $this->id=$_GET['id'];
        if (isset($_POST['submit'])) {
            $id = $_POST['productId'];
            $quantity = $_POST['quantity'];
            $date = $_POST['date'];
            $this->db->query("UPDATE stk_inventory SET quantity =:quantity, productId = :pId, added_date=:added_date  WHERE inventory_id = :id");
            $this->db->bind(':id', $this->id);
            $this->db->bind(':pId', $id);
            $this->db->bind(':quantity', $quantity);
            $this->db->bind(':added_date', $date);

            if ($this->db->execute()) {
//                return true;
                header('location:../ui/ReadInventory.php');
            } else {
                return false;
            }
        }
    }

    //DELETING RECORDS
    public function deleteInventory(){
        $this->id =$_GET['id'];
        $this->db->query("DELETE FROM stk_inventory WHERE inventory_id = :id");

        $this->db->bind(':id', $this->id);

        if($this->db->execute()){
//            return true;
            header('location:../ui/ReadInventory.php');
        }else{
            return false;
        }
    }
}