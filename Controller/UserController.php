<?php
namespace Controller;
use Model\User;
use Model\Task;

class UserController
{
    public function getUserHome()
    {
        if(isset($_GET['id']))
		{
            $user = User::findById($_GET['id']);
            $taskList = Task::getUserTasks($_GET['id']);

            include $_SERVER['DOCUMENT_ROOT'] . '/View/user/readUser.php';
        }
		else 
		{
            $userList = User::getAll();

            include $_SERVER['DOCUMENT_ROOT'] . '/View/user/userHome.php';
        }
    }
    public function createUser()
    {
        switch ($_SERVER['REQUEST_METHOD']) 
		{
            case 'POST':
                $user = new User();
                $user->setUserName($_POST['userName']);
                $user->setEmail($_POST['email']);
                $user->add();

                echo "User Added!";
                header("Location: /userHome");

                break;

            case 'GET':
                    include $_SERVER['DOCUMENT_ROOT'] . '/View/user/createUser.php';

                break;

            default:

        }
    }
    public function updateUser($id)
    {
        switch ($_SERVER['REQUEST_METHOD'])
		{
            case 'POST':
                $user = new User();
                $user->setUserName($_POST['userName']);
                $user->setEmail($_POST['email']);
                $user->update($userId);

                echo "User Updated!";
                header("Location: /userHome");

                break;

            case 'GET':

                $user = User::findById($id);
                include $_SERVER['DOCUMENT_ROOT'] . '/View/user/updateUser.php';
                break;

            default:

                echo 'Wrong Method!';

        }

    }
    public function deleteUser($id)
	{
        User::delete($id);
        header("Location: /userHome");
    }
    public function getOne($id)
	{
        $user = User::findById($id);
        $taskList = Task::getUserTasks($id);

        include $_SERVER['DOCUMENT_ROOT'] . '/View/user/readUser.php';
    }

}