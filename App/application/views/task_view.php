<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

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
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>