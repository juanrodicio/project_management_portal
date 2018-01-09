<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Issue</title>
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
            padding-left: 70px;
        }

        h1 {
            margin: 10px;
            padding-left: 30px;
        }

        h3 {
            margin: 10px;
            padding-left: 50px;
        }

        .button-right {
            text-align: right;
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
    <a href="<?=base_url() . "user/profile"?>"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>&#8195
    <a href="<?=base_url() . "user/log_out"?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
  </form>
</nav>
</br>

<div class="container">
    <div class="jumbotron">
        <div class="row">
            <?php
                if($issue->Issue_Status == 'active')
                    echo "<h1>$issue->Issue_Title <span class=\"badge badge-success\">$issue->Issue_Status</span></h1></br>";
                else
                    echo "<h1>$issue->Issue_Title <span class=\"badge badge-danger\">$issue->Issue_Status</span></h1></br>";
            ?>
        </div>
    </br>
        <div class="row">
        <div class="col">
            <h3>Description:</h3></br>
            <p><?=$issue->Issue_Description?></p>
        </div>
        <div class="col">
            <h3>Author: <?=$issue->Issue_Author?></h3>
        </div>
        </div>
    </div>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#Comments">Comments</a>
  </li>
  <?php
  if($issue->Issue_Status == 'active')
    echo "<li class=\"nav-item\">
        <a class=\"nav-link\" data-toggle=\"tab\" href=\"#newComment\">Add new comment</a>
        </li>";
  ?>
</ul></br>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active container" id="Comments">
      <?php
        foreach($comments as $comment){
            echo "<div class=\"row\">";
            echo "<div class=\"col-sm-3\">";
            echo    "<h3>$comment->Commentary_Author</h3>";
            echo "</div>";
            echo "<div class=\"jumbotron col\">";
            echo    "<h3>$comment->Commentary_Title</h3>";
            echo    "<p>$comment->Commentary_Comment</p>";
            echo "</div>";
            echo "</div>";
        }
      ?>
  </div>
  <div class="tab-pane container" id="newComment">
  <form name="form_newComment" method="POST" action="<?=base_url() . "userhome/newComment/$issue->Issue_ID"?>">
    
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Put here some title">

    <label for="commentary">Commentary:</label>
    <textarea class="form-control" rows="5" id="commentary" name="commentary" placeholder="Here your commentary"></textarea>
    
    </br><button type="submit" class="btn btn-success btn-block" value="comment" name="submit-comment">Comment!</button>

    </div>
</div></br>

<div class="button-right">
    <a href="<?=base_url() . "userhome/task/$issue->Task_ID/$projectid"?>" class="btn btn-primary" role="button">Back</a>
    <?php
    if($issue->Issue_Status == 'active' && $_SESSION['User_Type'] != 'Stakeholder')
        echo "<button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#myModal\">
                Close Issue
              </button>";?>
</div>

    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Closing Issue...</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Are you sure you want to close this issue?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="<?=base_url() . "userhome/close_issue/$issue->Issue_ID/$issue->Task_ID"?>" class="btn btn-success" role="button">Accept</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>
</html>