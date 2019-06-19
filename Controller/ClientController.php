<?php
namespace Controller;
use Model\Client;
use Model\Project;

class ClientController
{

    public function getClientHome()
    {
		if(isset($_GET['id']))
		{
        $client = Client::getOneById($_GET['id']);
        $projectList = Project::getAllProjectsFromClient($_GET['id']);

        include $_SERVER['DOCUMENT_ROOT'] . '/View/client/readClient.php';

		}	
		else 
		{
        $clientList = Client::getAll();

        include $_SERVER['DOCUMENT_ROOT'] . '/View/client/clientHome.php';
		}
	}
	public function readClient(){
        $client = Client::getOneById($_GET['id']);
        $projectList = Project::getAllProjectsFromClient($_GET['id']);
        include $_SERVER['DOCUMENT_ROOT'] . '/View/client/readClient.php';
    }

    public function createClient()
    {
        switch ($_SERVER['REQUEST_METHOD'])
		{
            case 'POST':
                $client = new Client();
                $client->setClientName($_POST['clientName']);
                $client->setEmail($_POST['email']);
                $client->save();

                echo "Client Added!";
                header("Location: /clientHome");

                break;

            case 'GET':
                include $_SERVER['DOCUMENT_ROOT'] . '/View/client/createClient.php';
                break;

            default:
                echo 'Wrong Method!';

        }

    }
    public function deleteClient($id)
	{
        Client::delete($id);
        header("Location: /clientHome");

    }
     public function updateClient($id)
    {
        switch ($_SERVER['REQUEST_METHOD'])
		{
            case 'POST':
                $client = new Client();
                $client->setClientName($_POST['clientName']);
                $client->setEmail($_POST['email']);
                $client->update($id);
                echo "User Updated!";
                header("Location: /clientHome");
                break;
            case 'GET':
                $client = Client::getOneById($id);
                include $_SERVER['DOCUMENT_ROOT'] . '/View/client/updateClient.php';
                break;
            default:
                echo 'Wrong Method!';
        }
	}
    public function getOne($id)
	{
        $client = Client::getOneById($id);
        $projectList = Project::getAllProjectsFromClient($id);

        include $_SERVER['DOCUMENT_ROOT'] . '/View/client/readClient.php';
    }

}