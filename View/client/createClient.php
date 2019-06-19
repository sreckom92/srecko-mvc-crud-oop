<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php $page_title = "New Client";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>
    <form action="" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Client Name</td>
            <td><input type='text' name='clientName' class='form-control' /></td>
        </tr>

        <tr>
            <td>Email Address</td>
            <td><input type='text' name='email' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
    <a href='/clientHome' class='btn btn-default pull-left'>Back</a>
</form>
</body>
</html>
