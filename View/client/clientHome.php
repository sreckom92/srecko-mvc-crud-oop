<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "Clients Home";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<div class='right-button-margin'>
	<a href='/home' class='btn btn-primary pull-left'>Home</a>
	<a href='/clientHome/create' class='btn btn-success left-margin'>
    <span class='glyphicon glyphicon-plus'></span> New client </a>
</div>

<table class='table table-hover table-responsive table-bordered'>

    <tr>
        <th>ID</th>
        <th>Client Name</th>
        <th>Email Address</th>
        <th>Actions</th>
    </tr>
	
    <?php

    if (!empty($clientList)) 
	{

        foreach ($clientList as $client) 
		{
			$read = '/clientHome?id='. $client->getId();
            $delete = '/clientHome/delete?id='. $client->getId();
            $update = '/clientHome/update?id='. $client->getId();

            echo '<tr>';
            echo "<td>" . $client->getId() . "</td>";
            echo "<td>" . $client->getClientName() . "</td>";
            echo "<td>" . $client->getEmail() . "</td>";
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
        echo 'No clients';
    }
    ?>

</table>

</body>
</html>