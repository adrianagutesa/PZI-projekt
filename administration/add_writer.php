<?php require_once("../shared/connecting_to_database.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/font-awesome.min.css" />
    <link rel="stylesheet" href="../styles/add_page_style.css" />
    <title>Add Writer</title>
</head>

<body>
    <?php
    if(!(empty($_REQUEST["name"])) && !(empty($_REQUEST["surname"])) && !(empty($_REQUEST["birth_year"])) && !(empty($_REQUEST["country"])) && isset($_REQUEST["button"])) {
	    $name = $mysqli->real_escape_string($_REQUEST["name"]);
	    $surname = $mysqli->real_escape_string($_REQUEST["surname"]);
	    $birth_year = $mysqli->real_escape_string($_REQUEST["birth_year"]);
	    $country = $mysqli->real_escape_string($_REQUEST["country"]);

        $result = $mysqli->query("SELECT * FROM pisac WHERE ime = '$name' AND prezime = '$surname' AND godina_rodenja = '$birth_year'");

        if ($matchFound = mysqli_num_rows($result) > 0) {
            ?>
            <div class="message">
                <?php
                    echo 'The writer already exists!';
                ?>
                <button class="back_btn"><a href="add_writer.php">Go Back</a></button>
            </div>

            <?php
        } else {
            $add = $mysqli->query("INSERT INTO pisac(ime, prezime, godina_rodenja, drzava) VALUES ('$name','$surname', '$birth_year', '$country')");
            echo "<script> location.href='../index.php'; </script>";
            exit;    
        }
    }
    else {
?>
    <div class="form-box">
        <h1>New Writer</h1>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="inputbox">
                <input type="text" name="name" required="required">
                <span>Name</span>
            </div>

            <div class="inputbox">
                <input type="text" name="surname" required="required">
                <span>Surname</span>
            </div>

            <div class="inputbox">
                <input type="number" name="birth_year" required="required">
                <span>Year of birth</span>
            </div>

            <div class="inputbox">
                <input type="text" name="country" required="required">
                <span>Country</span>
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
    <script src="../scripts/script.js"></script>

</body>

</html>