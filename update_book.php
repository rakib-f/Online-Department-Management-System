<?php include("header.php");?>
<?php include('db_con.php');?>
<div class="container-fluid">
    <div class="row" id="wrapper">
    <?php require_once'menubar.php';?>
    <div class="col-sm-12">
        <div class="panel panel-default">
        <div class="panel-body">


<?php

if (isset($_POST['submit'])){

     $id = $_REQUEST['id'];

     $book_name = $_POST['book_name'];
     $book_author = $_POST['book_author'];
     $book_publisher = $_POST['book_publisher'];
     $book_edition = $_POST['book_edition'];
     $book_quantity = $_POST['book_quantity'];
     $book_borrowed = $_POST['book_borrowed'];
     $book_available= $_POST['book_available'];

     $sql = "UPDATE `library` SET `book_name`='$book_name',`book_author`='$book_author',`book_publisher`='$book_publisher',`book_edition`='$book_edition',`book_quantity`='$book_quantity',`book_borrowed`='$book_borrowed',`book_available`='$book_available' WHERE book_id='$id'";
     $result = mysqli_query($conn,$sql);
     if($result){

        echo "<div class='alert alert-success'>";
        echo "<strong>Success!</strong>Successfully Updated";
        echo "</div>";
    }else{
        echo "<div class='alert alert-danger'>";
        echo "<strong>Error!</strong> in update.Please try again.";
        echo "</div>";
    }
}


?>
<center><h3>Update book Entry</h3></center>

<?php
    $id = $_REQUEST['id'];
    $sql1 = "SELECT * FROM library WHERE book_id='$id'";
     $result1 = mysqli_query($conn,$sql1);
     while($row = mysqli_fetch_array($result1)){

?>

<form action="update_book.php" method="post" class="form-horizontal" role="form">

            <div class="form-group">
                <label for="book_name" class="col-sm-2 control-label">Enter book name</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="book_name" value="<?= $row['book_name']; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="book_author" class="col-sm-2 control-label">Enter book author name</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="book_author" value="<?= $row['book_author']; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="book_publisher" class="col-sm-2 control-label">Publisher</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="book_publisher" value="<?= $row['book_publisher']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="book_edition" class="col-sm-2 control-label">Edition</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="book_edition" value="<?= $row['book_edition']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="book_quantity" class="col-sm-2 control-label">quantity</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="book_quantity" value="<?= $row['book_quantity']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="book_borrowed" class="col-sm-2 control-label">Book Borrowed</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="book_borrowed" value="<?= $row['book_borrowed']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="book_available" class="col-sm-2 control-label">Book Available</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="book_available" value="<?= $row['book_available']; ?>">
                </div>
            </div>
            
            <center><input type="submit" name="submit" value="Update" class="btn btn-primary" style="padding: 10px; width: 100px;"></center>
            <input type="hidden" name="id" value="<?=$id;?>" />
</form>
<br>
 <a href="library.php" class="btn btn-warning" style="padding: 10px; width: 100px;"> Go Back </a>

<?php
    }

?>
 </div>
 </div>
 </div>
 </div>
 </div>