<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project View</title>
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
    

    <?php
    if($user_type == 'Project Manager')
                echo "<a class=\"navbar-brand\" href=".base_url()."pmhome>Home</a>";
            else
                echo "<a class=\"navbar-brand\" href=".base_url()."userhome>Home</a>";
    ?>
     <form class="form-inline">
    <a href="<?=base_url() . "user/profile"?>"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>&#8195
    <a href="<?=base_url() . "user/log_out"?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
  </form>
</nav>

<div class="row">
  <div class="jumbotron col-sm-3">
    <?php 
        echo "<h1>$project->Project_Name</h1></br>";
        echo "<p>Description:</br>$project->Project_Description</p>";
        echo "<p>Start Date:</br>$project->Project_StartDate</p>";
        echo "<p>Final Date:</br>$project->Project_FinishDate</p>";
        echo "<p>Budget:</br>$project->Project_Budget</p>";
        echo "<p>Project Manager:</br>$project->Project_Manager</p>";
    ?>
    </br><label for="project_progress">Project progress:</label>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?=$project_progress?>%"><?=$project_progress?>%</div>
    </div></br>
  </div>
  <!--<div class="col-sm-1"></div>-->
  <div class="jumbotron col-sm-5">
    <?php
        if($user_type != 'Pig')
            echo "<h1>Project Tasks</h1></br>";
        else
            echo "<h1>Your Tasks</h1></br>";       
    ?>
    <div class="list-group">
        <?php
            foreach ($tasks as $task) {
                echo "<a href=\"../task/$task->Task_ID/$project->Project_ID\" class=\"list-group-item\"> $task->Task_Name &#8195 &#8195 &#8195 
                        $task->Task_StartDate &#8195 &#8195 &#8195 
                            $task->Task_FinishDate &#8195 &#8195 &#8195 
                                $task->Task_Status</a>";
            }
        ?>
    </div>
    <?php
        if($user_type == 'Project Manager')
            echo "<br><a href=\"../new_project_task/$project->Project_ID\" class=\"btn btn-success\" role=\"button\">Add Task</a>";
    ?>
  </div>
  <?php
        if($user_type == 'Project Manager')
        {
            echo "<div class=\"jumbotron col-sm-3\">";
            echo "<h1>Members:</h1>";
            foreach($members as $member)
            {
                echo "<p></br>$member->User_Name</p>";
            }
            
            echo "<br><a href=\"../new_project_member/$project->Project_ID\" class=\"btn btn-success\" role=\"button\">Add Member</a>";
            echo "</div>";
        }
            
    ?>
</div>

<?php
    if($user_type == 'Project Manager')
        echo "<a href=".base_url()."pmhome/ class=\"btn btn-primary\" role=\"button\">Back</a>";
    else
        echo "<a href=".base_url()."userhome/ class=\"btn btn-primary\" role=\"button\">Back</a>";
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>
</html>