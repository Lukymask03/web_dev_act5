<?php

require_once "database.php";

class Book extends Database{
    public $book_id ="";
    public $book_title = "";
    public $book_author = "";
    public $genre = "";
    public $publication_year = "";
    public $book_price = "";
    protected $db;

    public function __construct(){
       $this->db = new Database();

    }
    public function addBook(){
        $sql = "INSERT INTO books(book_title, book_author, genre, publication_year, book_price) VALUE (:book_title, :book_author, :genre, :publication_year, :book_price) ";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(":book_title", $this->book_title);
        $query->bindParam(":book_author", $this->book_author);
        $query->bindParam(":genre", $this->genre);
        $query->bindParam(":publication_year", $this->publication_year);
        $query->bindParam(":book_price", $this->book_price);
        return $query->execute();
    }
    public function viewProduct(){
        $sql = "SELECT * FROM books ORDER BY book_title ASC";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            return $query->fetchAll();            
        }else{
            return null;
        }
    }
     public function editBook(){
        $sql = "UPDATE product SET book_title=:book_title, book_author=:book_author, genre=:genre, publication_year=:publication_year, book_price=:book_price";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(":book_title", $this->book_title);
        $query->bindParam(":book_author", $this->book_author);
        $query->bindParam(":genre", $this->genre);
        $query->bindParam(":publication_year", $this->publication_year);
        $query->bindParam(":book_price", $this->book_price);
        
        return $query->execute();
    }
    public function fetchBook($b_book_id){
        $sql = "SELECT * FROM books ORDER BY book_title ASC";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            return $query->fetchAll();            
        }else{
            return null;
        }
    }
    public function isBookExist($b_book_title, $b_book_id = ""){
        $sql = "SELECT COUNT(*) as total FROM book WHERE book_title = :book_title and book_id != :id;";
        $query = $this->connect()->prepare($sql);
        $query->bindParam(":book_title", $b_book_title);
        $record = null;
        
        if($query->execute()) {
            $record = $query->fetch();
        }

        if($record["total" <  0 ]){
            return true;
        }else{
            return false;
        }
    }
}
