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
    </style>
</head>
<body class="bg-dark">
    <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">

 <?php if (isset($message)): ?>
    <h2> <?=$message?> </h2>
<?php endif;?>

 <!--form-->
 <!--@set_value en los inputs para que recuerde los datos introducidos-->
 <?=
form_open(base_url() . 'user/verify_register', array('name' => 'form_reg', ));?>
<div class="form-row">
    <div class="col-md-6">
<?=form_label('Username', 'Username');?> <br /> <br />
<?=form_input('username', @set_value('username'),'class="form-control" placeholder="Enter username"')?> <br /> <br />
    </div>
    <div class="col-md-6">
<?=form_label('Full Name', 'Full Name');?> <br /> <br />
<?=form_input('fullName', @set_value('fullName'), 'class="form-control" placeholder="Enter your full name"')?> <br /> <br />
    </div>
</div>
<?=form_label('Email', 'Email');?> <br /> <br />
<?=form_input('email', @set_value('email'), 'class="form-control" placeholder="Enter your email"')?> <br /> <br />
<div class="form-row">
    <div class="col-md-6">
<?=form_label('Password', 'Password');?> <br /> <br />
<?=form_password('password','','class="form-control" placeholder="Enter password"');?> <br /> <br />
    </div>
    <div class="col-md-6">
<?=form_label('Repeat password', 'Repeat_Password');?> <br /> <br />
<?=form_password('password2','','class="form-control" placeholder="Confirm your password"');?> <br /> <br />
    </div>
</div>
<div class="form-row">
<div class="col-md-6">
<?php $userTypes = array(
    'Pig' => 'Worker',
    'Project Manager' => 'Project Manager',
    'Stakeholder' => 'Stakeholder',
);
echo form_label('User Role', 'User Role');
echo "<br /> <br />";
echo form_dropdown('userTypes', $userTypes, 'Pig','class="form-control"');
?> <br /> <br />
</div>
    <div class="col-md-6">
<?=form_label('Group ID', 'Group ID');?> <br /> <br />
<?=form_input('groupID', '','class="form-control" placeholder="Enter your Group ID assigned"');?> <br /> <br />
    </div>
</div>
<?=form_submit('submit_reg', 'Register','class="btn btn-primary btn-block"');?>
<div class="text-center">
          <a class="d-block small mt-3" href="<?=base_url() . 'user/'?>">Login Page</a>
</div>
 <?=form_close();?>
 <hr />
 <?=validation_errors();?>
   </div>
  </div>
 </div>
</div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
 
 </body>
 </html>
