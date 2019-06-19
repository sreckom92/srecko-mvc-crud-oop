<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "User Overview";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<p>User Name: <?php if (isset($user)) {echo $user->getUserName();} ?></p>
<p>Email Address: <?php if (isset($user)) {echo $user->getEmail();} ?></p>

<div class='right-button-margin'>
	<a href='/home' class='btn btn-primary pull-left'>Home</a>
	<a href='/userHome/create' class='btn btn-success left-margin'>
    <span class='glyphicon glyphicon-plus'></span> New User </a>
</div>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
    </tr>
    <?php

    if (!empty($taskList)) 
	{

        foreach ($taskList as $task) 
		{
			$read = '/taskHome/read?id='. $task->getId();
            $delete = '/taskHome/delete?id='. $task->getId();
            $update = '/taskHome/update?id='. $task->getId();

            echo '<tr>';
            echo "<td>" . $task->getId() . "</td>";
			echo "<td>" . $task->getTaskName() . "</td>";
            echo "<td>" . $task->getTaskDesc() . "</td>";
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
        echo 'No tasks assigned for this user';
    }
    ?>

</table>
<a href='/userHome' class='btn btn-default pull-left'>Back</a>

</body>
</html>
