<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="halfmoon/css/halfmoon-variables.css"/>
	</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars dark-mode" >
	
 <!-- Page wrapper start -->
  <div class="page-wrapper with-navbar">
    <div class="sticky-alerts"></div>
    <nav class="navbar">
    	<a href="#" class="navbar-brand">
        <img src="https://dyzgames.es/wp-content/uploads/2021/03/Sin-t%C3%ADtulo-2-300x55.png" alt="..." style="background-color: white">
        DyzGames
      </a>
    </nav>

    <!-- Content wrapper start -->
    <div class="content-wrapper">
 	<div class="row row-eq-spacing-lg">
 		 <div class="col-lg-1"></div>
          <div class="col-lg-5">
            <div class="card h-lg-250 overflow-y-lg-auto"> 
              <h2 class="card-title-form-index">login</h2>
               <form action="" method="POST" class="form-inline w-450 mw-full">
				  <div class="form-group">
				    <label class="required w-100" for="username">Username</label> 
				    <input type="text" class="form-control" placeholder="Username" id="username" name="username" required="required">
				  </div>
				  <div class="form-group">
				    <label class="required w-100" for="password">Password</label> 
				    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required">
				  </div>
				   <button name="login" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button></center>
				</form>
					<?php include 'login.php'?>
            </div>
          </div>
          
          <div class="col-lg-5">
            <div class="card h-lg-auto overflow-y-lg-auto">
              <h2 class="card-title-form-index">register</h2>
              <form action="" method="POST" class="w-450 mw-full" >
				  <div class="form-group ">
				    <label for="username" class="required">Username</label>
				    <input type="text" class="form-control form-inline-sm" id="username" name="username" placeholder="Username" required="required">
				  </div>
				  <div class="form-group">
				    <label for="password" class="required">Password</label>
				    <input type="password" class="form-control" id="password" name="password" required="required" >
				  </div>
				  <center><button name="registrasion" class="btn btn-block btn-success">Register</button></center>
				</form>
				<?php include'registrasion.php'?>


            </div>
          </div>
    </div>
    <!-- Content wrapper end -->

  </div>
  <!-- Page wrapper end -->


</body>	
</html>