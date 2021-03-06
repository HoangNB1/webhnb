<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

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
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Genre
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="pop.php">Pop</a>
                      <a class="dropdown-item" href="#">Rock</a>
                      <a class="dropdown-item" href="#">Rap</a>
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
<!--              <li class="nav-item">
                  <a class="nav-link" href="#">Top 100</a>
              </li>-->
<!--              <li class="nav-item dropdown">
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
$username = "3.93.188.184"; // Khai báo username
$password = "123@123a";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "tunesource";      // Khai báo database

// Kết nối database
$connect = new mysqli($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$songID = "";
$songName = "";
$songIMG = "";
$songAudio = "";
$song_price = "";

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["songID"])) { $songID = $_POST['songID']; }
    if(isset($_POST["songName"])) { $songName = $_POST['songName']; }
    if(isset($_POST["songIMG"])) { $songIMG = $_POST['songIMG']; }
    if(isset($_POST["songAudio"])) { $songAudio = $_POST['songAudio']; }
	if(isset($_POST["song_price"])) { $song_price = $_POST['song_price']; }
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO song(songID, songName, songIMG, songAudio, song_price)
    VALUES ('$songID', '$songName', '$songIMG', '$songAudio', '$song_price')";

    if ($connect->query($sql) == TRUE) {
        echo "<script>alert('Song Has Been Added Successfully!')</script>";
		echo "<script>window.open('1.php','_self')</script>";
    } else {
        echo "<script>alert(Error')</script>: " . $sql . "<br>" . $connect->error;
    }
}
?>

<?php /*?><form action="" method="post">
    <table style="margin-left: 700px; margin-top: 30px;">
        <tr>
            <th>ID: </th>
            <td><input type="text" name="songID" value=""></td>
        </tr>

        <tr>
            <th>Name: </th>
            <td><input type="text" name="songName" value=""></td>
        </tr>

        <tr>
            <th>Image: </th>
            <td><input type="file" name="songIMG" value=""></td>
        </tr>
        
        <tr>
            <th>Audio: </th>
            <td><input type="file" name="songAudio" value=""></td>
        </tr>

        <tr>
            <th>Price: </th>
            <td><input type="text" name="song_price" value=""></td>
        </tr>


    </table>
    <button type="submit" style="margin-left: 700px; margin-top: 10px; border-radius: 5px;">Add</button>
</form><?php */?>

<form action="" method="post">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<h1 style="width: 100%; height: 40px; text-align: center">Add Song</h1>
<div style="margin-left: 300px; margin-top: 20px; ">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="songID">Song ID</label>  
  <div class="col-md-4">
  <input id="songID" name="songID" placeholder="Please enter the song ID" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="songName">Song Name</label>  
  <div class="col-md-4">
  <input id="songName" name="songName" placeholder="Please enter the song name" class="form-control input-md" required="" type="text">
  </div>
</div>


 
 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Song Image</label>
  <div class="col-md-4">
    <?php /*?><input id="filebutton" name="filebutton" class="input-file" type="file"><?php */?>
    <input type="file" name="songIMG" value="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Song Audio</label>
  <div class="col-md-4">
    <input id="filebutton" name="filebutton" class="input-file" type="file">
  </div>
</div>

 <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Song Price">Song Price</label>  
  <div class="col-md-4">
  <?php /*?><input id="song_price" name="song_price" placeholder="Please enter the Song Price" class="form-control input-md" required="" type="text"><?php */?>
  <input type="text" name="song_price" value="">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <?php /*?><button id="addbutton" name="addbutton" class="btn btn-primary">Add</button><?php */?>
    <button type="submit" class="btn btn-primary" >Add</button>
    <a href="1.php">
                            <input type="button" name="Back" value="Back" class="btn btn-default">
    </a>
  </div>
</div>
</div>

</fieldset>
</form>
</form>

<div id="footer">
  <h2 style="text-align:center; padding-top:30px">Copyright &copy;  2020  </h2>
  </div>

</body>
</html>
