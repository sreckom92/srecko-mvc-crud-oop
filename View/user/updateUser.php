<!DOCTYPE HTML>
<html lang="en">

<head>
    <<?php $page_title = "Update User";?>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/temp/bootstrap/layout_header.php';?>
</head>

<body>

<form action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Username</td>
            <td><input type='text' name='userName' value='<?php echo $user->getUserName() ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Email Address</td>
            <td><input type='text' name='email' value='<?php echo $user->getEmail() ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
    <a href='/userHome' class='btn btn-default pull-left'>Back</a>
</form>

</body>
</html>