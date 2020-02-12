<?php
namespace src\Models;

use PDO;
use src\Models\Database;

class Users extends Database {
    private $database;
    private $id;
    private $login;
    private $passkey;
    private $session_id;

    public function __construct() {
        parent::__construct();
        $this->database = parent::getConnection();
    }

    public function getId():int {
        return $this->id;
    }

    public function setId(int $id = 0):void{
        $this->id = $id;
    }

    public function getLogin():string {
        return $this->login;
    }

    public function setLogin(string $login = ""):void{
        $this->login = $login;
    }

    public function getPasskey():string {
        return $this->passkey;
    }

    public function setPasskey(string $passkey = ""):void{
        $this->passkey = password_hash($passkey, PASSWORD_DEFAULT);
    }

    public function getSessionId():string {
        return $this->session_id;
    }

    public function setSessionId(string $session_id = ""):void{
        $this->session_id = $session_id;
    }

    public function create():string {
        try {
            $login = $this->getLogin();
            $passkey = $this->getPasskey();

            $sql = $this->database->prepare("INSERT INTO users (login, passkey) VALUES (:login, :passkey)");
            $sql->bindParam(":login", $login, PDO::PARAM_STR);
            $sql->bindParam(":passkey", $passkey, PDO::PARAM_STR);
            $sql->execute();
            print_r($sql->errorInfo());
            return "User has been created";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function list():array {
        try {
            $sql = $this->database->query("SELECT * FROM users");

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return [];
        } catch(Exception $e) {
            return [ "errors" => $e->getMessage() ];
        }
    }

    public function show($id) {
        try {
            $sql = $this->database->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return [];
        } catch(Exception $e) {
            return [ "errors" => $e->getMessage() ];
        }
    }

    public function save($id):string {
        try {
            $login = $this->getLogin();
            $passkey = $this->getPasskey();

            $sql = $this->database->prepare("UPDATE users SET login = :login, passkey = :passkey WHERE id = :id");
            $sql->bindParam(":login", $login, PDO::PARAM_STR);
            $sql->bindParam(":passkey", $passkey, PDO::PARAM_STR);
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            $sql->execute();
            return "User has been updated";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function remove($id):string {
        try {
            $sql = $this->database->prepare("DELETE FROM users WHERE id = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            $sql->execute();
            return "User has been removed";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function login():array {
        try {
            $sql = $this->database->prepare("SELECT * FROM users WHERE login = :login AND passkey = :passkey");
            $sql->bindParam(":login", $this->getLogin(), PDO::PARAM_STR);
            $sql->bindParam(":passkey", $this->getPasskey(), PDO::PARAM_STR);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return [];
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function createSession():string {
        try {
            $sql = $this->database->prepare("UPDATE users SET session_id = ? WHERE id = ?");
            $sql->bindParam(":session_id", $this->getSessionId(), PDO::PARAM_STR);
            $sql->bindParam(":id", $this->getUserId(), PDO::PARAM_INT);
            $sql->execute();
            return "User session has been created";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroySession():string {
        try {
            $sql = $this->database->prepare("UPDATE users SET session_id = ? WHERE id = ?");
            $sql->bindParam(":session_id", $this->getSessionId(), PDO::PARAM_STR);
            $sql->bindParam(":id", $this->getUserId(), PDO::PARAM_INT);
            $sql->execute();
            return "User session has been removed";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
