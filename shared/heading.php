<?php require_once("shared/connecting_to_database.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <title>Books</title>
</head>

<body>
    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar_container">
            <a href="#home" id="navbar_logo">
                <img src="images/logo.png" alt="logo" />
            </a>
            <div class="navbar_toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar_menu">
                <li class="navbar_iteam">
                    <a href="#home" class="navbar_links" id="home-page">Home</a>
                </li>
                <li class="navbar_iteam">
                    <a href="#writers" class="navbar_links" id="writers-page">Writers</a>
                </li>
                <li class="navbar_iteam">
                    <a href="#books" class="navbar_links" id="books-page">Books</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" id="home">
        <div class="hero_container">
            <h1 class="hero_heading">Your favorite writers</h1>
            <p class="hero_description">Lots of books</p>
            <button class="main_btn"><a href="#books">Explore</a></button>
        </div>
    </div>

    <!-- Writers Section -->
    <div class="writers" id="writers">

        <div class="search-container">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="search-box" onkeyup="search()" placeholder="Search for writer" />
        </div>

        <div class="writers_container" id="writers_container">

            <div class="writers_img-container" id="writers_img-container">
                <div class="writers_img-card">
                    <img src="./images/writers.jpg" alt="writers">
                </div>
            </div>

            <div id="left-arrow" class="arrow"></div>

            <div id="container">
                <?php
                    $result = $mysqli->query("SELECT * FROM pisac  ORDER BY prezime, ime ") ;
                    while ($myrow=$result->fetch_row())
                    {
                        echo "<div class=writers_content id=writers_content><div class=writer> <h1>" .$myrow[1]. " " .$myrow[2]. "</h1> 
                            <p> Born in: " .$myrow[3]. ", " .$myrow[4]. "</p> 
                            </div></div>";   
                    }
                ?>
            </div>

            <div id="right-arrow" class="arrow"></div>

        </div>

    </div>

    <!-- Books Section -->
    <div class="books" id="books">
        <h1>List of books</h1>

        <div class="search-container">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="search-box-book" onkeyup="Booksearch()" placeholder="Search for book" />
        </div>


        <div class="books_wrapper">
            <?php
                $result = $mysqli->query("SELECT * FROM knjiga JOIN pisac ON knjiga.id_pisca=pisac.id 
                                                        ORDER BY knjiga.naziv ") ;

                while ($myrow=$result->fetch_row())
                {
                    echo "<div class=books_card> <h1>" .$myrow[1]. "</h1>
                            <p>" .$myrow[2]. "</p>
                            <p> <strong> Written in: </strong>" .$myrow[3]. "</p>
                            <p> <strong> Pages: </strong>".$myrow[4]. "</p>
                            <p> <strong> Written by: </strong>" .$myrow[7]. " " .$myrow[8]. "</p>
                        </div>";   
                }
            ?>
        </div>

    </div>