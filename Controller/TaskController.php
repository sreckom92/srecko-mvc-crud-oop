<?php
namespace Controller;
use Model\Task;
use Model\User;
use Model\Project;
class TaskController
{

    public function createTask($id)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $task = new Task();
                $task->setTaskName($_POST['taskName']);
                $task->setTaskDesc($_POST['taskDesc']);
                $task->setProjectId($id);
                $task->setUserId($_POST['userId']);
                $task->saveTask();
                echo "Task Created!";
                header("Location: /projectHome?id=$id");
                break;
            case 'GET':
                $userList = User::getAll();
                include $_SERVER['DOCUMENT_ROOT'] . '/View/task/createTask.php';
                break;
            default:
                echo 'Wrong Method!';
        }
    }
	
	public function getTasks()
    {
        if(isset($_GET['userId'])){
            $task = Task::findById($_GET['id']);
            $taskList = Task::getUserTasks($_GET['userId']);

            include $_SERVER['DOCUMENT_ROOT'] . '/View/task/readTask.php';

        }else {

            $taskList = Task::getAll();


            include $_SERVER['DOCUMENT_ROOT'] . '/View/task/taskHome.php';
        }
    }

    public function deleteTask($id){


        Task::remove($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


}