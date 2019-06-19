<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "Tasks Home";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<div class='right-button-margin'>
	<a href='/home' class='btn btn-primary pull-left'>Home</a>
	<a href='/taskHome/create' class='btn btn-success left-margin'>
    <span class='glyphicon glyphicon-plus'></span> New task </a>
</div>

<table class='table table-hover table-responsive table-bordered'>

    <tr>
        <th>ID</th>
        <th>Task Name</th>
        <th>Task Description</th>
        <th>Actions</th>
    </tr>
	
    <?php

    if (!empty($taskList)) 
	{

        foreach ($taskList as $task) 
		{
			$read = '/taskHome?id='. $task->getId();
            $delete = '/taskHome/delete?id='. $task->getId();
            
            echo '<tr>';
            echo "<td>" . $task->getId() . "</td>";
            echo "<td>" . $task->getTaskName() . "</td>";
            echo "<td>" . $task->getTaskDesc() . "</td>";
            echo "<td>"."<a href='$read' class='btn btn-primary left-margin'>
   				 <span class='glyphicon glyphicon-list'></span> Read </a>

				<a href='$delete' class='btn btn-danger'>
                <span class='glyphicon glyphicon-remove'></span> Delete </a>"."</td>";
            echo '</tr>';
        }
    } 
	else 
	{
        echo 'No tasks';
    }
    ?>

</table>

</body>
</html>