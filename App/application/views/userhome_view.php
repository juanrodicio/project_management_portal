<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HomePage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
  <div class="jumbotron col-sm-3">
    <h1>Your Projects</h1>
  </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">Project Name &#8195 Project Start Date &#8195 Project Finish Date</div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="list-group col-sm-4">
        <?php
        foreach ($projects as $proyecto) {
            echo "<a href=\"project/$proyecto->Project_ID\" class=\"list-group-item\"> $proyecto->Project_Name &#8195 &#8195 &#8195 $proyecto->Project_StartDate &#8195 &#8195 &#8195 $proyecto->Project_FinishDate</a>";
        }
        ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>