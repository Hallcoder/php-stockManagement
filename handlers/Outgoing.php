<?php
require_once ("database.php");
class Outgoing
{
    public $db;
    public $id;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Get all posts
    public function getOutgoing(){
        $this->db->query("SELECT * FROM outgoing");
        return $this->db->resultSet();
    }

    //GET One Post
    public function getOutgoingById(){
        $this->id=$_GET['id'];
        $this->db->query("SELECT * FROM outgoing WHERE outgoingId=:id");

        $this->db->bind(':id', $this->id);
        return $this->db->single();
    }

    // Inserting into Records
    public function addOutgoing(){
        if(isset($_POST['submit'])) {
            $id = $_POST['productId'];
            $quantity = $_POST['quantity'];
            $date= $_POST['date'];
        $this->db->query("INSERT INTO outgoing(productId, quantity, added_date) VALUES (:pId , :quantity, :added_date)");
        $this->db->bind(':pId', $id);
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':added_date', $date);


            if($this->db->execute()){
//            return true;
                header('location:../ui/ReadOutgoing.php');
        }else{
            return false;
            }
        }
    }

    //UPDATING RECORDS
    public function updateOutgoing()
    {
        $this->id=$_GET['id'];
        if (isset($_POST['submit'])) {
            $id = $_POST['productId'];
            $quantity = $_POST['quantity'];
            $date = $_POST['date'];
            $this->db->query("UPDATE outgoing SET productId = :pId, quantity =:quantity, added_date=:added_date  WHERE outgoingId = :id");
            $this->db->bind(':id', $this->id);
            $this->db->bind(':pId', $id);
            $this->db->bind(':quantity', $quantity);
            $this->db->bind(':added_date', $date);

            if ($this->db->execute()) {
//                return true;
                header('location:../ui/ReadOutgoing.php');
            } else {
                return false;
            }
        }
    }

    //DELETING RECORDS
    public function deleteOutgoing(){
        $this->id =$_GET['id'];
        $this->db->query("DELETE FROM outgoing WHERE outgoingId = :id");

        $this->db->bind(':id', $this->id);

        if($this->db->execute()){
//            return true;
            header('location:../ui/ReadOutgoing.php');
        }else{
            return false;
        }
    }
}