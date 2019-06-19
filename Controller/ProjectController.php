<?php
namespace Controller;

use Model\Project;
use Model\Task;

class ProjectController
{

        public function createProject($id)
		{

            switch ($_SERVER['REQUEST_METHOD']) 
			{
                case 'POST':

                    $project = new Project();

                    $project->setProjectName($_POST['projectName']);
                    $project->setProjectDesc($_POST['projectDesc']);
                    $project->setClientId($clientId);
                    $project->save();

                    echo "Project Added!";
                    header("Location: /projectHome/createProject?id=$id");

                    break;

                case 'GET':
                    include $_SERVER['DOCUMENT_ROOT'] . '/View/project/createProject.php';
                    break;

                default:
                    echo 'Wrong Method!';

            }

		}

        public function deleteProject($id)
		{
            Project::delete($projectId);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
		public function getProjectHome()
		{
        if(isset($_GET['id']))
			{
            $project = Project::getOneById($_GET['id']);
            $projectList = Project::getAllProjectsFromClient($_GET['id']);

            include $_SERVER['DOCUMENT_ROOT'] . '/View/project/projectHome.php';

			}
			else 
			{
            $projectList = Project::getAll();

            include $_SERVER['DOCUMENT_ROOT'] . '/View/project/projectHome.php';
			}
		}

        public function getOne($id)
		{
            $project = Project::getOneById($id);
            $taskList = Task::getProjectTasks($id);

            include $_SERVER['DOCUMENT_ROOT'] . '/View/project/readProject.php';
        }
		
}