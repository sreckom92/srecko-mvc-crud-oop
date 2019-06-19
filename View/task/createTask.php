<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "Create Task";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>


<form action="" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Task Name</td>
            <td><input type='text' name='taskName' class='form-control' /></td>
        </tr>

        <tr>
            <td>Task Description</td>
            <td><input type='text' name='taskDesc' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Assign To:</td>
            <td><select name="id">
				<?php
					if (!empty($userList)) 
					{
						foreach ($userList as $user)
						{
							echo "<option value='" .$user->getId()."'>";
							echo $user->getUserName();
							echo "</option>";
						}
					}
				?>
				</select></td>
        </tr>
 
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
    <a href='/taskHome' class='btn btn-default pull-left'>Back</a>
</form>

</body>
</html>