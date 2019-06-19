<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "Project Overview";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<p>Project Name: <?php if (isset($project)) {echo $project->getProjectName();} ?></p>
<p>Project Description: <?php if (isset($project)) {echo $project->getProjectDesc();} ?></p>

<div class='right-button-margin'>
	<a href=<?php if (!empty($project)) {echo "/taskHome/create?id=".$project->getId();} ?> class='btn btn-success left-margin'>
    <span class='glyphicon glyphicon-plus'></span> Assign Task </a>
</div>

<h2>Tasks:</h2>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    <?php
    if (!empty($taskList) ) {
        foreach ($taskList as $task) {
			
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
    } else {
        echo 'No tasks assigned to this project';
    }
    ?>

</table>
<a href='/projectHome' class='btn btn-default pull-left'>Back</a>
</body>

</html>