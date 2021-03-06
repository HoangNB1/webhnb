<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/css1.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery-3.3.1.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>.
#footer{
   width:100%;
   height:100px;
   background: #f0f0f0;
   clear:both;
   
}
</style>

</head>

<body>

<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand"  href="index.php"><img src="images/logo1.jpg" height="65px" width="130px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php"> Home</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" id="navbarDropdown">
                      Genre
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="#">Pop</a>
                      <a class="dropdown-item" href="#">Rock</a>
                      <a class="dropdown-item" href="#">Indie</a>
                   <!--<div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">All</a>-->
                  </div>
              </li>
              <!--<li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Artist
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="#">US</a>
                      <a class="dropdown-item" href="#">UK</a>
                      <a class="dropdown-item" href="#">VN</a>
                  </div>
              </li>-->
              <li class="nav-item">
                  <a class="nav-link" href="1.php">All Song</a>
              </li>

              <li class="nav-item dropdown">
                  <a class="nav-link" id="navbarDropdown">Admin</a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="addproduct.php">Add Song</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="editsong.php">Edit Song</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="deletesong.php">Delete Song</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" id="navbarDropdown">Account</a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="login.php">Login</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="register.php">Register</a>
                  </div>
              </li>
          </ul>
          
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search Song" name="search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="ok">Search</button>
          </form>
          
      </div>
  </div>
</nav>
<!-- end menu -->
<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/carousel7.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/carousel5.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/carousel3.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/carousel6.jpg" alt="Fourth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end slide -->
<!-- list product -->
<div class="container">
	<div class="row mt-5">
		<h2 style="width: 100%; text-align: center">Result</h2>
		<!--<div class="list-product-subtitle">
			<p>List product description</p>
		</div>-->
        </br>
        </br>
		<div class="product-group">
        
			<div class="row">
            
            <?php
		$hostname = "3.93.188.184";
		$user = "root";
		$pass = "123@123a";
		$db = "tunesource";

		$con = mysqli_connect($hostname,$user,$pass,$db);
		mysqli_query($con,$db);
		mysqli_set_charset($con,"utf8");
            ?>
            
            <?php
        if (isset( $_GET['ok']) && $_GET["search"] != '') {
            $search = $_GET['search'];
    
                       $get_song = " SELECT * FROM song WHERE songName like '%$search%' ";
                        $run_song = mysqli_query($con, $get_song);
                        while($row_song = mysqli_fetch_array($run_song))
                        {
                          $songID = $row_song['songID'];
                          $songName = $row_song['songName'];
                          $songIMG = $row_song['songIMG'];
						  $songAudio = $row_song['songAudio'];
                          $song_price = $row_song['song_price'];

                          echo "              
               <div class='col-md-4 col-sm-6 col-xs-12'>
				<img src='images/$songIMG' width='250' height='250' />
				<h5>$songName</h5>
				<h8>Price: $song_price$</h8>
				<a style='float:center'>
				  <a href='' class='btn btn-primary'>Buy</a>
				</a>
				</br>
				</br>
				<audio controls style='width:250px' >
					<source src='music/$songAudio' type='audio/mpeg'
				</audio>
				
			  </div>
              
                          ";
                        }
                }
                    ?>
            
            </div>
            </div>
	</div>
</div>

<div id="footer">
  <h2 style="text-align:center; padding-top:30px">Copyright &copy;  2020  </h2>
</div>

<!-- Load jquery trước khi load bootstrap js -->
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
