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

<style>
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
                      <!--<div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">All</a>
                  </div>
              </li>-->
              <li class="nav-item">
                  <a class="nav-link" href="1.php">All Song</a>
              </li>
              <!--<li class="nav-item">
                  <a class="nav-link" href="#">Top 100</a>
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
              </li>-->
              <li class="nav-item dropdown">
                  <a class="nav-link" id="navbarDropdown">Account</a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="login.php">Login</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="register.php">Register</a>
                  </div>
              </li>
          </ul>
          
          <form class="form-inline my-2 my-lg-0" action="search.php">
              <input class="form-control mr-sm-2" type="search" placeholder="Search Song" name="search">
              <button class="btn btn-primary" type="submit" name="ok">Search</button>
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

<?php
$hostname = "3.93.188.184";
$user = "root";
$pass = "123@123a";
$db = "tunesource";
$con = mysqli_connect($hostname,$user,$pass,$db);
mysqli_query($con,$db);
mysqli_set_charset($con,"utf8");

$sql = "select * from song ";
$result = mysqli_query($con,$sql);
?>

<div class="infor">
	<h1 style="width: 100%; height: 40px; text-align: center">All Song</h1>
	<div style="margin-left: 300px; margin-top: 20px; ">
	<table  width="900" border="1px solid #f3f3f3;" align="center" style="margin-top: 10px; text-align: center;" >
		<tr>
			<th width="50px;">Song ID</th>
			<th width="200px;">Name</th>
			<th width="150px;">Image</th>
			<th width="100px;">Audio</th>
            <th width="100px;">Price</th>
			<th width="300px">Actions</th>
		</tr>
		<?php while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?php echo $row['songID']; ?> </td>
				<td><?php echo $row['songName']; ?></td>
				<td><img src="images/<?php echo $row['songIMG']; ?>" style="max-width: 100px;"></td>
				<td><audio controls loop src="music/<?php echo $row['songAudio']; ?>"></audio></td>
                <td><?php echo $row['song_price']; ?></td>
				<td>
					<a href="addproduct.php">Add</a> |
					<a href="deletesong.php">Delete</a> |
					<a href="editsong.php">Edit</a>
				</td>
			</tr>
		<?php } 
		?>
	</table>
		</div>
        </div>
</div>

<div id="footer">
  <h2 style="text-align:center; padding-top:30px">Copyright &copy; 2020  </h2>
  </div>

</body>
</html>
