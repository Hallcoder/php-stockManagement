<?php


require_once("database.php");

class Post{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //Get all posts 
    function getPosts(){
        $this->db->query("SELECT * FROM tbl_oop_post");
        return $this->db->resultSet();
    }

    //GET One Post
    function getPostsById($id){
        $this->db->query("SELECT * FROM tbl_oop_post WHERE id=:id");

        $this->db->bind(':id',$id);
        return $this->db->single();
    }

    // Inserting into Records
    function addPost($data){
        $this->db->query("INSERT INTO tbl_oop_post(title, content) VALUES (:title , :content)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //UPDATING RECORDS
    function updatePost($data){
        $this->db->query("UPDATE tbl_oop_post SET title= :title,  content = :content WHERE id = :id");

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

        //DELETING RECORDS
        function deletePost($id){
            $this->db->query("DELETE FROM tbl_oop_post WHERE id = :id");
    
            $this->db->bind(':id', $id);
    
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
}