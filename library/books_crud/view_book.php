<?php
require_once __DIR__ . "./library/books_backend/books.php";
$booksObj = new Book();

foreach($bookObj->viewBook($search) as $book){
    $message = "Are you sure you wanted tod delete the public ".
    $book["book_title"] . "?";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library | View Book</title>
</head>
<body>
    <h1>List of Books</h1>
    <a href="add_book.php">Add Book</a>
    <table border="1">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th>Book Price</th>
            </tr>
            <?php
            foreach($bookObj->viewBook() as $book) {
            ?>
            <tr>
                <td><?= $book['book_title']; ?></td>
                <td><?= $book['book_author']; ?></td>
                <td><?= $book['genre']; ?></td>
                <td><?= $book['publication_year']; ?></td>
                <td><?= $book['book_price']; ?></td>

            </tr>
            <?php
            }
            ?>
    </table>
</body>
</html>