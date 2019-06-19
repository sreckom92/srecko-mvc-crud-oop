<?php
namespace Model;
use \Database;

class Client
{
    public $id;
    public $clientName;
    public $email;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getClientName()
    {
        return $this->clientName;
    }
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function save()
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $stmt = $db->prepare("INSERT INTO clients (clientName, email) VALUES (:clientName, :email)");
        $stmt->execute([':clientName' => $this->clientName, ':email' => $this->email ]);
    }

    public static function delete($id)
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();
        $stmt = $db->prepare("DELETE FROM clients WHERE id= :id");
        $stmt->execute([':id' => $id]);
    }
    public function update($id)
	{
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $stmt = $db->prepare("UPDATE clients SET clientName = :clientName , email= :email WHERE id = :id;");
        $stmt->execute(['clientName' => $this->clientName,'email' => $this->email,'id' => $id]);

    }
    public static function getAll()
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $list=[];
        $stmt = $db->prepare("SELECT * FROM clients");
        $stmt->execute();

            while ($obj = $stmt->fetch(\PDO::FETCH_ASSOC)) 
			{
                $client = new Client();
                $client->setId($obj['id']);
                $client->setClientName($obj['clientName']);
                $client->setEmail($obj['email']);

                $list[] = $client;
            }

            return $list;

    }
    public static function  getOneById($id)
    {
        $dbInstance =Database::getInstance();
        $db = $dbInstance->getConnection();

        $stmt = $db->prepare("SELECT * FROM clients");
        $stmt->execute();

        if (!empty($obj = $stmt->fetch(\PDO::FETCH_ASSOC))) 
		{

            $client = new Client();
            $client->setId($obj['id']);
            $client->setClientName($obj['clientName']);
            $client->setEmail($obj['email']);

            return $client;

        }
    }

}