<?php
namespace Model;
use \Database;

class Task
{
    public $id;
    public $taskName;
    public $taskDesc;
    public $userId;
    public $projectId;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTaskName()
    {
        return $this->taskName;
    }

    public function setTaskName($taskName)
    {
        $this->taskName = $taskName;
    }

    public function getTaskDesc()
    {
        return $this->taskDesc;
    }

    public function setTaskDesc($taskDesc)
    {
        $this->taskDesc = $taskDesc;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    public static function getAll()
	{
		$dbInstance =Database::getInstance();
		$db = $dbInstance->getConnection();
        $list=[];
        $stmt = $db->prepare("SELECT * FROM tasks");
        $stmt->execute();

		while ($obj = $stmt->fetch(\PDO::FETCH_ASSOC)) 
			{
			$task = new Task();
			$task->setId($obj['id']);
			$task->setTaskName($obj['taskName']);
			$task->setTaskDesc($obj['taskDesc']);
			$task->setUserId($obj['userId']);
			$task->setProjectId($obj['projectId']);
			
			$list[] = $task;

			}
            return $list;

	}
    public function save()
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("INSERT INTO tasks (taskName, taskDesc, userId, projectId) VALUES (:taskName, :taskDesc, :userId,:projectId)");
        $stmt->execute([ 'taskName' => $this->taskName,'taskDesc' => $this->taskDesc,'userId' => $this->userId,'projectId' => $this->projectId ]);
    }
    public static function remove($id)
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("DELETE FROM tasks WHERE id=?");

        $stmt->execute(['id'=>$id]);
    }
    public static function findById($id)
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("SELECT * FROM projects WHERE id= :id");

        $stmt->execute([ 'id' => $id ]);

        if (!empty($obj = $stmt->fetch(\PDO::FETCH_ASSOC))) 
			{

            $task = new Task;
            $task->setId($obj['id']);
            $task->setTaskName($obj['taskName']);
            $task->setTaskDesc($obj['taskDesc']);
            $task->setUserId($obj['userId']);
            $task->setProjectId($obj['projectId']);

            return $task;
			
			}
	}
    public static function getProjectTasks($id)
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $list=[];
        $stmt = $db->prepare("SELECT * FROM tasks where userId=:id");
        $stmt->execute([':id'=>$id]);

        while ($obj = $stmt->fetch(\PDO::FETCH_ASSOC)) 
		{

            $task = new Task;
            $task->setId($obj['id']);
            $task->setTaskName($obj['taskName']);
            $task->setTaskDesc($obj['taskDesc']);
            $task->setUserId($obj['userId']);
            $task->setProjectId($obj['projectId']);

            $list[] = $task;
        }

        return $list;

    }
    public static function getUserTasks($id)
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $list=[];
        $stmt = $db->prepare("SELECT * FROM tasks where userId=:id");
        $stmt->execute([':id'=>$id]);

        while ($obj = $stmt->fetch(\PDO::FETCH_ASSOC)) 
		{
            $task = new Task;
            $task->setId($obj['id']);
            $task->setTaskName($obj['taskName']);
            $task->setTaskDesc($obj['taskDesc']);
            $task->setUserId($obj['userId']);
            $task->setProjectId(['projectId']);
			
            $list[] = $task;
        }

        return $list;

    }

}