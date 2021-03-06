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

<style title="text/css">
.example{
	margin:20px;
}

#footer{
   width:100%;
   height:100px;
   background: #f0f0f0;
   clear:both;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand"  href="index.php"><img src="images/logo1.jpg" height="65px" width="130px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php"> Home</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Genre
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="#">Pop</a>
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
                  <a class="nav-link" href="#" id="navbarDropdown">Account</a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="login.php">Login</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="register.php">Register</a>
                  </div>
              </li>
          </ul>
          
<!--          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>-->
      </div>
  </div>
</nav>
<!-- end menu -->



<form method="post" action="">
    	<table align="left" width="70%">
        	<tr align="left">
            	<td colspan="4"> <h2>Login</h2>
                	<br/>
                    <span> Dont have an account? <a href="register.php"> Register here</a>
                    <br/>
                    </span></td>
                 </tr>
                    <tr>
                    	<td width="15%"><b>Username: </b></td>
                        <td colspan="3"><input type="text" name="username" required placeholder="username"/></td>
                        </tr>
                        <tr>
                        <td width="15%"><b>Password: </b></td>
                        <td colspan="3"><input type="password" name="password" required placeholder="password"/></td>
                        </tr>
                        <tr align="left">
                        	<td></td>
                          <td colspan="4"><input type="submit" name="login" value="login" class="btn btn-primary"/>
                            <a href="index.php">
                            <input type="button" name="Menu" value="Menu" class="btn btn-primary">
                            </a></td>
                            </tr>
         </table>
</form>
    
<?php 
$con = new mysqli('localhost', 'root', '', 'tunesource');
			if (!$con){
				echo "ket noi that bai";				
			}
if(isset($_POST['login'])){
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $result = mysqli_query($con, "select * from account where username='$username' AND password='$password' " );
  
  $check_login = mysqli_num_rows($result);
  
  $row_login = mysqli_fetch_array($result);
  
  if($check_login == 0){
   echo "<script>alert('Password or Username is incorrect, please try again!')</script>";
   exit();
  }  
  if($check_login > 0){ 
  
  echo "<script>alert('You have logged in successfully !')</script>";
  echo "<script>window.open('index.php','_self')</script>";
  
  }
}

?>

<div id="footer">
  <h2 style="text-align:center; padding-top:30px">Copyright &copy;  2020  </h2>
  </div>

</body>
</html>