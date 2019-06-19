<?php
spl_autoload_register(function ($class) {
    include $_SERVER['DOCUMENT_ROOT'] . '/'. str_replace('\\', '/', $class) . '.php';

});

$request = $_SERVER["REQUEST_URI"];
$getQuery = $_SERVER["QUERY_STRING"];

$homeController = new Controller\HomeController();
$userController = new Controller\UserController();
$clientController = new Controller\ClientController();
$projectController = new Controller\ProjectController();
$taskController = new Controller\TaskController();


if(isset($_SERVER['REDIRECT_URL']))
    $request = $_SERVER['REDIRECT_URL'];
else $request='';

switch ($request) {
    case '':
        $homeController->getHome();
        break;
    case '/':
        $homeController->getHome();
        break;
	case '/home':
        $homeController->getHome();
        break;

    case '/userHome':
        $userController->getUserHome();
        break;


    case '/userHome/create':
        $userController->createUser();
        break;

    case '/userHome/delete':
        $userController->deleteUser($_GET['id']);
        break;
    case '/userHome/update':
        $userController->updateUser($_GET['id']);
        break;
	case '/userHome/read':
        $userController->getOne($_GET['id']);
        break;


    case '/clientHome':
        $clientController->getClientHome();
        break;

    case '/clientHome/create':
        $clientController->createClient();
        break;

    case '/clientHome/delete':
        $clientController->deleteClient($_GET['id']);
        break;

    case '/clientHome/update':
        $clientController->updateClient($_GET['id']);
        break;


    case '/projectHome/create':
        $projectController->createProject($_GET['id']);
        break;

    case '/projectHome/delete':
        $projectController->deleteProject($_GET['id']);
        break;

    case '/projectHome/read':
        $projectController->getOne($_GET['id']);
        break;
	case '/projectHome':
        $projectController->getProjectHome();
        break;

    case '/taskHome/create':
        $taskController->createTask($_GET['id']);
        break;
		
	case '/taskHome':
        $taskController->getTasks();
        break;


    case '/taskHome/delete':
        $taskController->deleteTask($_GET['id']);
        break;
		
		
	case '/updateUser?'. $getQuery:
        require __DIR__ . '/View/user/updateUser.php';
        break;


    default:
       echo var_dump($_REQUEST);
       echo "<hr>";
       echo var_dump($_SERVER);
       break;      
}
?>