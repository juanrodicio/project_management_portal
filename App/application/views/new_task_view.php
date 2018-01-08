<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Task to Project</title>
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
  <a class="navbar-brand" href="<?=base_url() . "pmhome"?>">Home</a>
  <form class="form-inline">
    <a href="<?=base_url() . "user/log_out"?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
  </form>
</nav>
</br>

<form name="form_project" method="POST" action="<?=base_url() . 'pmhome/add_task/'.$project_id.''?>">
 
  
  <div class="row">
    <div class="col"></div>
    <div class="form-group col">
      <label for="tname">Name:</label>
      <input type="text" class="form-control" id="tname" name="taskname">
    </div>
  <div class="col"></div>
  </div>
  
  <div class="row">
    <div class="col"></div>
    <div class="form-group col">
      <label for="tdesc">Description:</label>
      <input type="text" class="form-control" id="tdesc" name="taskdesc">
    </div>
  <div class="col"></div>
  </div>
  
  <div class="row">
    <div class="col"></div>
    <div class="form-group col">
      <label for="tstart">Start date:</label>
      <input type="text" placeholder="YYYY/MM/DD" class="form-control" id="tstart" name="taskstart">
    </div>
  <div class="col"></div>
  </div>
  
  <div class="row">
    <div class="col"></div>
    <div class="form-group col">
      <label for="tfinish">Finish date:</label>
      <input type="text" placeholder="YYYY/MM/DD" class="form-control" id="tfinish" name="taskfinish">
    </div>
  <div class="col"></div>
  </div>
  
  <div class="row">
    <div class="col"></div>
    <div class="form-group col">
      <label for="tmembers">Assign members:</label><br>
      <select name="project_members[]" multiple="multiple">
         <?php
            foreach($project_members as $pm)
            {
                echo "<option value=\"".$pm->User_Name."\">".$pm->User_Name."</option>";
            }
         ?>
      </select>
    </div>
  <div class="col"></div>
  </div>

  <div class="row">
    <div class="col"></div>
    <button type="submit" class="btn btn-primary col" value="Insert" name="submit-task">Add Task!</button>
    <div class="col"></div>
  </div>

</form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>
</html>