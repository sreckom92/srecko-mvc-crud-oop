<?php
namespace Model;
use \Database;

class Project
{
    public $id;
    public $projectName;
    public $projectDesc;
    public $clientId;

    public function getid()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProjectName()
    {
        return $this->projectName;
    }

    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
    }

    public function getProjectDesc()
    {
        return $this->projectDesc;
    }

    public function setProjectDesc($projectDesc)
    {
        $this->projectDesc= $projectDesc;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public static function getAll()
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $list=[];
        $stmt = $db->prepare("SELECT * FROM projects");
        $stmt->execute();

            while ($obj = $stmt->fetch(\PDO::FETCH_ASSOC)) 
			{

                $project = new Project();
                $project->setId($obj['id']);
                $project->setProjectName($obj['projectName']);
                $project->setProjectDesc($obj['projectDesc']);
                $project->setClientId($obj['clientId']);

                $list[] = $project;
            }

            return $list;
			
    }
    public function save()
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("INSERT INTO projects (projectName, projectDesc, clientId) VALUES (:projectName, :projectDesc, :clientId)");
        $stmt->execute(['projectName' => $this->projectName,'projectDesc'=>$this->projectDesc,'clientId'=>$this->clientId]);
    }
    public static function delete($id)
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("DELETE FROM projects WHERE id=?");
        $stmt->execute(['id'=>$id]);
    }
    public static function  getOneById($id)
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("SELECT * FROM projects WHERE id= :id");

        $stmt->execute([ 'id' => $id ]);

        if (!empty($obj = $stmt->fetch(\PDO::FETCH_ASSOC))) 
		{

            $project = new Project();
            $project->setId($obj['id']);
            $project->setProjectName($obj['projectName']);
            $project->setProjectDesc($obj['projectDesc']);
            $project->setClientId($obj['clientId']);

            return $project;
        }

    }
    public static function getAllProjectsFromClient($clientId)
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $list=[];
        $stmt = $db->prepare("SELECT * FROM projects where id=:clientId");
        $stmt->execute([':clientId'=>$clientId]);

        while ($obj = $stmt->fetch(\PDO::FETCH_ASSOC)) 
		{
            $project = new Project();
            $project->setId($obj['id']);
            $project->setProjectName($obj['projectName']);
            $project->setProjectDesc($obj['projectDesc']);
            $project->setClientId($obj['clientId']);

            $list[] = $project;
        }

        return $list;
	}

}