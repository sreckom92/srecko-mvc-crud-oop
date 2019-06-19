<?php
namespace Model;
use \Database;

class User
{
    public $id;
    public $userName;
    public $email;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function add()
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("INSERT INTO users (userName, email) VALUES (:userName, :email)");
        $stmt->execute([':userName' => $this->userName, ':email' => $this->email ]);
	}
    public static function delete($id)
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("DELETE FROM users WHERE id= :id");
        $stmt->execute(["id"=>$id]);
    }
    public function update($id)
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $stmt = $db->prepare("UPDATE users SET userName = :userName , email= :email WHERE id = :id;");
        $stmt->execute([':userName' => $this->userName, ':email' => $this->email,':id' =>$id]);
    }
    public static function getAll()
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $list=[];
        $stmt = $db->prepare("SELECT * FROM users");
        $stmt->execute();

        while ($obj = $stmt->fetch(\PDO::FETCH_ASSOC)) 
		{

            $user = new User();
            $user->setId($obj['id']);
            $user->setUserName($obj['userName']);
            $user->setEmail($obj['email']);
            $list[] = $user;
        }

        return $list;
	}

    public static function  findById($id)
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $stmt = $db->prepare("SELECT * FROM users");
        $stmt->execute();

        if (!empty($obj = $stmt->fetch(\PDO::FETCH_ASSOC))) 
		{
            $user = new User();
            $user->setId($obj['id']);
            $user->setUserName($obj['userName']);
            $user->setEmail($obj['email']);

            return $user;
        }

    }
}