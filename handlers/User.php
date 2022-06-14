<?php
require_once ("database.php");
class User
{
    public $db;
    public $id;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Get all posts
    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }

    //GET One Post
    function getUsersById($id)
    {
        $this->db->query("SELECT * FROM users WHERE userId=:id");

        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Inserting into Records
    public function addUsers()
    {
        if(isset($_POST['submit'])){
            $firstname= $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $telephone= $_POST['telephone'];
            $nation= $_POST['nationality'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $cpassword= $_POST['cpassword'];
            $date= $_POST['date'];

            $this->db->query("INSERT INTO users(firstname, lastname, telephone, gender,nationality,username, email, password, added_time) VALUES (:fname , :lname, :tel, :gender, :nation, :username, :email, :password, :added_time)");
            $this->db->bind(':fname', $firstname);
            $this->db->bind(':lname', $lastname);
            $this->db->bind(':tel', $telephone);
            $this->db->bind(':gender', $gender);
            $this->db->bind(':nation', $nation);
            $this->db->bind(':username', $username);
            $this->db->bind(':password', $password);
            $this->db->bind(':email', $email);
            $this->db->bind(':added_time', $date);

            if ($this->db->execute()) {
//                return true;
                header('location: ../Login/public/login.php');
            } else {
                return false;
            }
        }
    }

    //UPDATING RECORDS
    function updateUsers()
    {
        $this->id=$_GET['id'];
        if(isset($_POST['submit'])){
            $firstname= $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $telephone= $_POST['telephone'];
            $nation= $_POST['nationality'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $cpassword= $_POST['cpassword'];
            $date= $_POST['date'];

            $this->db->query("UPDATE users SET firstname= :fname, lastname=:lname, telephone=:tel, gender=:gender,nationality=:nation,username=:username, email=:email, password=:password, added_time=:added_time WHERE userId = :id");
            $this->db->bind(':id', $this->id);
            $this->db->bind(':fname', $firstname);
            $this->db->bind(':lname', $lastname);
            $this->db->bind(':tel', $telephone);
            $this->db->bind(':gender', $gender);
            $this->db->bind(':nation', $nation);
            $this->db->bind(':username', $username);
            $this->db->bind(':password', $password);
            $this->db->bind(':email', $email);
            $this->db->bind(':added_time', $date);

            if ($this->db->execute()) {
                header('location:../ui/ReadUsers.php');
            } else {
                return false;
            }
        }
    }

    //DELETING RECORDS
    function deleteUser()
    {
        $this->id=$_GET['id'];
        $this->db->query("DELETE FROM users WHERE userId = :id");

        $this->db->bind(':id', $this->id);

        if ($this->db->execute()) {
            header('location:../ui/ReadUsers.php');
        } else {
            return false;

        }
    }
}