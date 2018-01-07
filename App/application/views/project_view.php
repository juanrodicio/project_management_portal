<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
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
  </div>
  <div class="col-sm-1"></div>
  <div class="jumbotron col-sm-4">
    <?php
        echo "<h1>Tasks</h1></br>";
    ?>
    <div class="list-group">
        <?php
            foreach ($tasks as $task) {
                echo "<a href=\"../task/$task->Task_ID\" class=\"list-group-item\"> $task->Task_Name &#8195 &#8195 &#8195 $task->Task_StartDate &#8195 &#8195 &#8195 $task->Task_FinishDate</a>";
            }
        ?>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>