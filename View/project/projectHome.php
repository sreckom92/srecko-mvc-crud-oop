<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "Projects Home";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<div class='right-button-margin'>
	<a href='/home' class='btn btn-primary pull-left'>Home</a>
	<a href='/projectHome/create' class='btn btn-success left-margin'>
    <span class='glyphicon glyphicon-plus'></span> New project </a>
</div>

<table class='table table-hover table-responsive table-bordered'>

    <tr>
        <th>ID</th>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>Actions</th>
    </tr>
	
    <?php

    if (!empty($projectList)) 
	{

        foreach ($projectList as $project) 
		{
			$read = '/projectHome/read?id='. $project->getId();
            $delete = '/projectHome/delete?id='. $project->getId();
            
            echo '<tr>';
            echo "<td>" . $project->getId() . "</td>";
            echo "<td>" . $project->getProjectName() . "</td>";
            echo "<td>" . $project->getProjectDesc() . "</td>";
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