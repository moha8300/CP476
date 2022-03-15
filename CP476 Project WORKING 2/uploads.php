
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
        background-color: lightgray;
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
  <div class="container">
    <div class="navbar">
      <div class="name">
        <label>Kijiji Spinoff!</label>
      </div>
      <nav>
        <ul class="licolor">
          <li><a href="welcome.php">Homepage</a></li>
          <li><a href="create_listing.php">Post</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>
    </header>
<?php
    session_start();
    // Include the database configuration file
    #include 'create_listing.php';
    $conn = new mysqli("127.0.0.1", "root", "laksitha", "listings");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

    // Get images from the database

    $query = $conn->query("SELECT * FROM listings ORDER BY posted DESC");

    #$query = $listings_conn->query("SELECT * FROM listings ORDER BY posted DESC LIMIT 3");
            
    $homepage_listings = array();

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imageURL = 'uploads/'.$row["picture"];
            $title = $row["title"];
            $price = $row["price"];
            $poster_id = $row["id_posted"];
            $descrip = $row["description"];
            $timestamp = $row["posted"];
?>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?php echo $imageURL; ?>" width="100%" height="225"/>
                        <div class="card-body">
                            <p class="card-text"><strong><?php echo $title; ?></strong></p> 
                            <p class="card-text"><strong>Listed: <?php echo  "$" . $price; ?></strong></p>
                            <p class="card-text"> <strong>Description: </strong></p> 
                            <p class="card-text"><?php echo $descrip; ?> </p>
                            <small class="text-muted"> <?php echo $timestamp; ?> </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }
}else{ ?>
    <p>No listing(s) posted...</p>
<?php } 

?>
</body>

</html>