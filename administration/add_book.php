<?php require_once("../shared/connecting_to_database.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/font-awesome.min.css" />
    <link rel="stylesheet" href="../styles/add_page_style.css" />
    <title>Add Book</title>
</head>

<body>
    <?php
    if(!(empty($_REQUEST["ISBN"])) && !(empty($_REQUEST["book_name"])) && !(empty($_REQUEST["category"])) && !(empty($_REQUEST["year"])) && !(empty($_REQUEST["pages"])) && isset($_REQUEST["writer"]) && isset($_REQUEST["button"])) {
	    $ISBN = $mysqli->real_escape_string($_REQUEST["ISBN"]);
	    $book_name = $mysqli->real_escape_string($_REQUEST["book_name"]);
	    $category = $mysqli->real_escape_string($_REQUEST["category"]);
	    $year = $mysqli->real_escape_string($_REQUEST["year"]);
	    $pages = $mysqli->real_escape_string($_REQUEST["pages"]);

        $reach_writer = $_REQUEST["writer"];

        $result = $mysqli->query("SELECT * FROM knjiga WHERE naziv = '$book_name' OR ISBN = '$ISBN'");

        if ($matchFound = mysqli_num_rows($result) > 0) {
            ?>
            <div class="message">
                <?php
                    echo 'The book already exists!';
                ?>
                <button class="back_btn"><a href="add_book.php">Go Back</a></button>
            </div>

            <?php
        } else {
            $add = $mysqli->query("INSERT INTO knjiga(ISBN, naziv, kategorija, godina_izdavanja, broj_stranica, id_pisca) VALUES ('$ISBN','$book_name', '$category', '$year', '$pages','$reach_writer')") ;
            echo "<script> location.href='../index.php'; </script>";
            exit;   
        }
    }
    else {
?>
    <div class="form-box">
        <h1>New Book</h1>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="inputbox">
                <input type="text" pattern="[0-9]{10}" name="ISBN" required="required">
                <span>ISBN</span>
            </div>

            <div class="inputbox">
                <input type="text" name="book_name" required="required">
                <span>Book name</span>
            </div>

            <div class="inputbox">
                <input type="text" name="category" required="required">
                <span>Category</span>
            </div>

            <div class="inputbox">
                <input type="number" name="year" required="required">
                <span>Year</span>
            </div>

            <div class="inputbox">
                <input type="number" name="pages" required="required">
                <span>Number of pages</span>
            </div>

            <div class="inputbox">
                <select name="writer" class="writer" required="required">
                    <option value="" disabled="disabled" selected="selected">Written by</option>
                    <?php
                        $writers = $mysqli->query("SELECT * FROM pisac ORDER BY prezime, ime");
                        while($reach_writer=$writers->fetch_row()) {
                    ?>
                    <option value="<?php echo $reach_writer[0]?>">
                        <?php echo "$reach_writer[1] $reach_writer[2]"?>
                    </option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="inputbox" id="buttons">
                <button type="submit" name="button">Submit</button>
                <button class="home_btn"><a href="../index.php">Home</a></button>
            </div>

        </form>
        
    </div>
    <?php
    }
?>
</body>

</html>