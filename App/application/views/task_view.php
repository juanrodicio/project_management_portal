<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
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
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand" href="<?=base_url() . "userhome"?>">Home</a>
  <form class="form-inline">
    <a href="<?=base_url() . "user/profile"?>"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>&#8195
    <a href="<?=base_url() . "user/log_out"?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
  </form>
</nav>

<?php
    if(isset($result))
        if($result)
            echo "<div class=\"alert alert-success\">
                    <strong>Successful</strong> Task marked as done.
                  </div>";
        else
            echo "<div class=\"alert alert-danger\">
                <strong>Failed</strong> Can't mark Task as done.
                  </div>";
?>

<div class="row">
  <div class="jumbotron col-sm-3">
    <?php 
        echo "<h1>$task->Task_Name</h1></br>";
        echo "<p>Description:</br>$task->Task_Description</p>";
        echo "<p>Start Date:</br>$task->Task_StartDate</p>";
        echo "<p>Final Date:</br>$task->Task_FinishDate</p>";
        echo "<p>Status:</br>$task->Task_Status</p>";

        $datetime1 = new DateTime($task->Task_FinishDate);
        $datetime2 = new DateTime();
        $interval = $datetime2->diff($datetime1);

        echo "<p>Remaining Days:</br>".$interval->format('%R%a days')."</p>";
    ?>
  </div>
</div>
<?php
    if($task->Task_Status == 'Pending')
        echo "<a href=\"".base_url() . "/userhome/done_task/$task->Task_ID/$project_id\" class=\"btn btn-success\" role=\"button\">Mark as done</a>";
    echo "<a href=\"../../project/$project_id\" class=\"btn btn-primary\" role=\"button\">Back</a>";
?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>
</html>