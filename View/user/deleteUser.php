<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';

$page_title = "User Deletion";
include $_SERVER['DOCUMENT_ROOT'] . '/View/temp/bootstrap/layout_header.php';

$delete_id = htmlspecialchars($_GET["id"]);
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->deleteUsers($delete_id);

 echo "<div class='alert alert-success alert-dismissable'>";
            echo "User deleted.";
echo "<a href='userHome' class='btn btn-default pull-left'>Back</a>";

include $_SERVER['DOCUMENT_ROOT'] . '/View/bootstrap/layout_footer.php';