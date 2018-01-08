<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <style>
        body {
            margin: 10px;
            padding-left: 20px;
        }

        .img {
            margin: 10px;
            padding-left: 20px;
        }

        .jumbotron {
            margin: 20px;
            padding-left: 20px;
        }

        p {
            margin: 10px;
            padding-left: 30px;
        }

        h2 {
            margin: 10px;
            padding-left: 30px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand" href="<?=base_url() . "userhome"?>">Home</a>
  <form class="form-inline">
    <a href="<?=base_url() . "user/log_out"?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
  </form>
</nav>
</br>

<?php
  if(isset($result))
  {
    if($result)
    {
      echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
        echo "<strong>Success!</strong> Profile modificated.";
      echo "</div>";
    }
    else
    {
      echo "<div class=\"alert alert-danger alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
        echo "<strong>Fail!</strong> Couldn't update profile";
      echo "</div>";
    }
  }
  ?>

<form name="form_profile" method="POST" action="<?=base_url() . 'user/update_user'?>">
  
  <div class="row">
    <div class="form-group col">
      <label for="username">Username:</label>
      <h2><?=$_SESSION['User_Name']?></h2>
    </div>
    <div class="col"></div>
    <div class="col"></div>
  </div>

  <div class="row">
    <div class="col">
      <label for="userType">Rol:</label>
      <h2><?=$user->User_Type?></h2>
    </div>
    <div class="form-group col">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?=$user->User_Email?>">
    </div>
    <div class="col"></div>
  </div>

  <div class="row">
    <div class="col">
      <label for="userGroup">Group:</label>
      <h2><?=$user->Group_Name?></h2>
    </div>
    <div class="form-group col">
      <label for="fullName">Full Name:</label>
      <input type="text" class="form-control" id="fullName" name="fullName" value="<?=$user->User_FullName?>">
    </div>
    <div class="col"></div>
  </div>

  <div class="row">
    <div class="col"></div>
    <div class="form-group col">
      <label for="pwd">Update Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
      <p>If you don't want to change your password, just let it blank</p>
    </div>
  <div class="col"></div>
  </div>

  <div class="row">
    <div class="col"></div>
    <button type="submit" class="btn btn-primary col" value="Update" name="submit-profile">Modify Data</button>
    <div class="col"></div>
  </div>

</form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>
</html>