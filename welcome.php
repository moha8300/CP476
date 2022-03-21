<?php

    session_start();
    #error_reporting(0);

    include 'config.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Kijiji Spinoff</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/"> -->

    

    <!-- Bootstrap core CSS -->
    <link href="style1.css" rel="stylesheet">
    <!-- <link href="style2.css" rel="stylesheet"> -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      body {
        background-color: #D6CE93;
      }
      .navbar{
        display: flex;
        align-items: center;
        padding: 20px;
       
      }
      nav{
        flex: 1;
        text-align: right;
      }
      nav ul{
        display: inline-block;
        list-style-type: none;
      }
      nav ul li{
        display: inline-block;
        margin-right: 20px;

      }
      a{
        text-decoration: none;
        color: #555;
      }
      p{
        color: #555;
      }
      .licolor{
        color: white;
      }
      .navbar{
        background-color: #A3A380;
      }
      
      #homepagelistings {
        background-color: #D6CE93;
      }
     

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="">
    <div class="navbar">
      <div class="name">
        <label>Kijiji Spinoff!</label>
      </div>
      <nav>
        <ul class="licolor">
          <li><a href="uploads.php">Listings</a></li>
          <li><a href="create_listing.php">Post</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>
  
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><b>Kijiji Spinoff Introduction</b></h1>
        <h1 class="fw-light"><b>Welcome <?php echo $_SESSION['user_login']; ?> </b></h1>
        <p class="lead text-muted">Kijiji Spinoff is a web applicaion designed to interact with the user, allowing the user to post anything they desire. You are able to view all listings that have been posted by various people, and post a listing yourself.</p>  
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light" >
    <div class="container" id="homepagelistings">
    <h1 class="fw-light"><b>New Listings</b></h1>
    <?php
        // Include the database configuration file
        #include 'create_listing.php';
        $listings_conn = new mysqli("127.0.0.1", "root", "laksitha", "listings");
        
            // Check connection
            if ($listings_conn->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
        
        // Get images from the database
        
        $query = $listings_conn->query("SELECT * FROM listings ORDER BY posted DESC LIMIT 3");
        
        $homepage_listings = array();

        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $imageURL = 'uploads/'.$row["picture"];
                $title = $row["title"];
                $price = $row["price"];
                $poster_id = $row["id_posted"];
                $descrip = $row["description"];
                $timestamp = $row["posted"];
                
                $each_listing = array($imageURL, $title, $price, $descrip, $timestamp);
                array_push($homepage_listings, $each_listing);
        ?>   
        <?php }
        }else{ ?>
            <p>No listing(s) posted...</p>
        <?php 
            } 
        ?>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
          <img src="<?php echo $homepage_listings[0][0]; ?>" width="100%" height="225"/>
            <div class="card-body">
            <p class="card-text"><strong><?php echo $homepage_listings[0][1]; ?></strong></p> 
            <p class="card-text"><strong>Listed: <?php echo  "$" . $homepage_listings[0][2]; ?></strong></p>
            <p class="card-text"> <strong>Description: </strong></p> 
              <p class="card-text"><?php echo $homepage_listings[0][3]; ?> </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <p class="listRef">Click <b><a href="uploads.php">here</a></b> to see listings page</p>
                </div>
                <small class="text-muted"> <?php echo $homepage_listings[0][4]; ?> </small>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
          <img src="<?php echo $homepage_listings[1][0]; ?>" width="100%" height="225"/>
            <div class="card-body">
            <p class="card-text"><strong><?php echo $homepage_listings[1][1]; ?></strong></p> 
            <p class="card-text"><strong>Listed: <?php echo  "$" . $homepage_listings[1][2]; ?></strong></p>
            <p class="card-text"> <strong>Description: </strong></p> 
              <p class="card-text"><?php echo $homepage_listings[1][3]; ?> </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <p class="listRef">Click <b><a href="uploads.php">here</a></b> to see listings page</p>
                </div>
                <small class="text-muted"> <?php echo $homepage_listings[1][4]; ?> </small>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
          <img src="<?php echo $homepage_listings[2][0]; ?>" width="100%" height="225"/>
            <div class="card-body">
            <p class="card-text"><strong><?php echo $homepage_listings[2][1]; ?></strong></p> 
            <p class="card-text"><strong>Listed: <?php echo  "$" . $homepage_listings[2][2]; ?></strong></p>
            <p class="card-text"> <strong>Description: </strong></p> 
              <p class="card-text"><?php echo $homepage_listings[2][3]; ?> </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <p class="listRef">Click <b><a href="uploads.php">here</a></b> to see listings page</p>
                </div>
                <small class="text-muted"> <?php echo $homepage_listings[2][4]; ?> </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Kijiji Spinoff is developed by Laksitha, Bilal, Ali, Leron and Raza.</p>
    <p class="mb-0">Please enjoy <a href="create_listing.php">creating a listing</a> or <a href="uploads.php">viewing all listings</a>.</p>
  </div>
</footer>      
  </body>
</html>
