<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "New Project";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Project Name</td>
            <td><input type='text' name='projectName' class='form-control' /></td>
        </tr>

        <tr>
            <td>Project Description</td>
            <td><input type='text' name='projectDesc' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
    <a href='/projectHome' class='btn btn-default pull-left'>Back</a>
</form>

</body>
</html>