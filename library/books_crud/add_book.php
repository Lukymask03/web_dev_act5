<?php
require_once __DIR__ . "/books_backend/books.php";
$bookObj = new Book();


$book = ["book_title"=>"","book_author"=>"","genre"=>"","publication_year"=>""];
$errors = ["book_title"=>"","book_author"=>"","genre"=>"","publication_year"=>""];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $book["book_title"] = trim(htmlspecialchars($_POST["book_title"]));
    $book["book_author"] = trim(htmlspecialchars($_POST["book_title"]));
    $book["genre"] = trim(htmlspecialchars($_POST["genre"]));
    $book["publication_year"] = trim(htmlspecialchars($_POST["publication_year"]));

    if(empty($book["book_title"])){
        $error["book_title"] = "Book is required";
    }

    if(empty($book["book_author"])){
        $error["book_author"] = "Author is required";
    }

    if(empty($book["genre"])){
        $error["genre"] = "Genre is required";
    }

    if(empty($book["publication_year"])){
        $error["publication_year"] = "Year published is required";
    }

    if(empty(array_filter($errors))){
        $bookObj->$book_title = $book["book_title"];
        $bookObj->$book_author = $book["book_author"];
        $bookObj->$genre = $book["genre"];
        $bookObj->$publictaion_year = $book["publication_year"];

        if($bookObj->addBook()){
            header("Location : viewproduct.php");
        }else{
            echo "failed";
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LIBRARY | ADD BOOK</title>
    <style>
      label{display:block}
      .error, span {color: red; margin : 0 ;}
    </style>
</head>
<body>
    <h1>Add Book</h1>
    <label for="">Field with <span>*</span> is required</label>
       <form for= "">
     <label for="book_title">Book Title <span>*</span></label>
     <input type="varchar" name="book_title" id="book_title" value="<?=$book["book_title"] ?? '' ?>">
     <p class="error"><?= $errors["book_title"]?></p>
     <lable for="book-author"> Book Author <span>*</span></label>
     <input type="varchar" name="book_author" id="book_author" value="<?=$boook["book_author"] ?? '' ?>">
     <p class= "error"><?= $errors["book_author"]?></p>
     <label for="genre"> Genre
     <select name="genre">
        <option value="">--Select Genre--</option>
        <option value="history">-- History --</option> 
        <option value="fiction">-- Fiction--</option> 
        <option value="science">-- Science --</option> 
     </select>
     </label>
     <label for="publication_year">Year Published</label>
     <input type="varchar" name="publication_year" id="publication_year" value="<?=$book["publication_year"] ?? '' ?>">
     <br>
     <label for="book_price">Book Price <span>*</span></label>
     <input type="decimal" name="book_price" id="book_price" value="<?=$book["boook_price"] ?? '' ?>">
     <br>
     <br>
     <input type="submit" value="Add Book">>
    </form>
</body>
</html>