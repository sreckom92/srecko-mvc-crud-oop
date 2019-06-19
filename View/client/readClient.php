<!DOCTYPE HTML>
<html lang="en">

<head>
	<?php $page_title = "Client Overview";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<p>Client Name: <?php if (isset($client)) {echo $client->getClientName();} ?></p>
<p>Email Address: <?php if (isset($client)) {echo $client->getEmail();} ?></p>

<h2>Projects:</h2>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    <?php

    if (!empty($projectList)) 
	{

        foreach ($projectList as $project) 
		{
			$read = '/projectHome?id='. $project->getId();
            $delete = '/projectHome/delete?id='. $project->getId();
            $update = '/projectHome/update?id='. $project->getId();
            

            echo '<tr>';
            echo "<td>" . $project->getId() . "</td>";
            echo "<td>" . $project->getProjectName() . "</td>";
            echo "<td>" . $project->getProjectDesc() . "</td>";
            echo "<td>"."<a href='$read' class='btn btn-primary left-margin'>
   				<span class='glyphicon glyphicon-list'></span> Read </a>
 
				<a href='$update' class='btn btn-info left-margin'>
    			<span class='glyphicon glyphicon-edit'></span> Edit </a>
 
				<a href='$delete' class='btn btn-danger'>
                <span class='glyphicon glyphicon-remove'></span> Delete </a>"."</td>";
            echo '</tr>';
            echo '</tr>';
        }
    } 
	else 
	{
        echo 'No projects for this user';
    }
    ?>

</table>
	<a href='/clientHome' class='btn btn-default pull-left'>Back</a>
	
	<div class='right-button-margin'>
		<a href='/projectHome/create' class='btn btn-success left-margin'>
		<span class='glyphicon glyphicon-plus'></span> Assign Project </a>
	</div>
	
</body>
</html>