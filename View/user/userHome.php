<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "Users Home";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<div class='right-button-margin'>
	<a href='/home' class='btn btn-primary pull-left'>Home</a>
	<a href='userHome/create' class='btn btn-success left-margin'>
    <span class='glyphicon glyphicon-plus'></span> New user </a>
</div>

<table class='table table-hover table-responsive table-bordered'>

    <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Email Address</th>
        <th>Actions</th>
    </tr>
	
    <?php

    if (!empty($userList)) 
	{

        foreach ($userList as $user) 
		{
			$read = '/userHome/read?id='. $user->getId();
            $delete = '/userHome/delete?id='. $user->getId();
            $update = '/userHome/update?id='. $user->getId();

            echo '<tr>';
            echo "<td>" . $user->getId() . "</td>";
            echo "<td>" . $user->getUserName() . "</td>";
            echo "<td>" . $user->getEmail() . "</td>";
            echo "<td>"."<a href='$read' class='btn btn-primary left-margin'>
   				<span class='glyphicon glyphicon-list'></span> Read </a>
 
				<a href='$update' class='btn btn-info left-margin'>
    			<span class='glyphicon glyphicon-edit'></span> Edit </a>
 
				<a href='$delete' class='btn btn-danger'>
                <span class='glyphicon glyphicon-remove'></span> Delete </a>"."</td>";
            echo '</tr>';
        }
    } 
	else 
	{
        echo 'No users';
    }
    ?>

</table>

</body>
</html>