<?php

require_once('Database.php');

class Post {

    private $db;    

    public function __construct(){
        $this->db = new Database();
    }

    // Get all posts
    public function getPosts(){
        $this->db->query("SELECT * from tbl_oop_posts");
        return $this->db->resultSet();
    }

    // Get One Post 
    public function getPostById($id){
        $this->db->query("SELECT * FROM tbl_oop_posts where id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Insert Records
    public function addPost($data){
        $this->db->query("INSERT INTO tbl_oop_posts (title, content) VALUES (:title, :content)");
        
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);

        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }

    // Update Records
    public function updatePost($data){
        $this->db->query("UPDATE tbl_oop_posts SET title = :title, content = :content where id = :id");
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);

        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }

    // Delete Records
    public function deletePost($id){
        $this->db->query("DELETE FROM tbl_oop_posts where id = :id");
        
        $this->db->bind(':id', $id);
      
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }

}