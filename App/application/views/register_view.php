<html lang="en">
<head>
 <meta charset="utf-8">
 <title>User Register</title>
</head>
<body>
 <h1>User Register</h1>
 
 <?php if (isset($message)): ?>
    <h2> <?=$message?> </h2>
<?php endif;?>

 <!--form-->
 <!--@set_value en los inputs para que recuerde los datos introducidos-->
 <?=
form_open(base_url() . 'index.php/user/verify_register', array('name' => 'form_reg
', ));?>
<?=form_label('Username', 'Username');?> <br /> <br />
<?=form_input('username', @set_value('username'))?> <br /> <br />

<?=form_label('Full Name', 'Full Name');?> <br /> <br />
<?=form_input('fullName', @set_value('fullName'))?> <br /> <br />

<?=form_label('Email', 'Email');?> <br /> <br />
<?=form_input('email', @set_value('email'))?> <br /> <br />

<?=form_label('Password', 'Password');?> <br /> <br />
<?=form_password('password');?> <br /> <br />

<?=form_label('Repeat password', 'Repeat_Password');?> <br /> <br />
<?=form_password('password2');?> <br /> <br />

<?php $userTypes = array(
    'Pig' => 'Worker',
    'Project Manager' => 'Project Manager',
    'Stakeholder' => 'Stakeholder',
);
echo form_label('User Role', 'User Role');
echo "<br /> <br />";
echo form_dropdown('userTypes', $userTypes, 'Pig');
?> <br /> <br />

<?=form_label('Group ID', 'Group ID');?> <br /> <br />
<?=form_input('groupID');?> <br /> <br />

<?=form_submit('submit_reg', 'Register');?>
<a href="<?=base_url() . 'index.php/user/'?>" title="Log in">Log in!</a>
 <?=form_close();?>
 <hr />
 <?=validation_errors();?>
</body>
</html>
