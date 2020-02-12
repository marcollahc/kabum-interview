<?php
namespace src\Models;

use PDO;
use src\Models\Database;

class Clients extends Database {
    private $database;
    private $id;
    private $name;
    private $birthdate;
    private $cpf;
    private $rg;
    private $phone;

    public function __construct() {
        parent::__construct();
        $this->database = parent::getConnection();
    }

    public function getId():int {
        return $this->id;
    }

    public function setId(int $id = 0):void {
        $this->id = $id;
    }

    public function getName():string {
        return $this->name;
    }

    public function setName(string $name = ""):void {
        $this->name = $name;
    }

    public function getBirthdate():string {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate = ""):void {
        $this->birthdate = $birthdate;
    }

    public function getCPF():string {
        return $this->cpf;
    }

    public function setCPF(string $cpf = ""):void {
        $this->cpf = $cpf;
    }

    public function getRG():string {
        return $this->rg;
    }

    public function setRG(string $rg = ""):void {
        $this->rg = $rg;
    }

    public function getPhone():string {
        return $this->phone;
    }

    public function setPhone(string $phone = ""):void {
        $this->phone = $phone;
    }

    public function create():string {
        try {
            $name = $this->getName();
            $birthdate = $this->getBirthdate();
            $cpf = $this->getCPF();
            $rg = $this->getRG();
            $phone = $this->getPhone();

            $sql = $this->database->prepare("INSERT INTO clients (name, birthdate, cpf, rg, phone) VALUES (:name, :birthdate, :cpf, :rg, :phone)");
            $sql->bindParam(":name", $name, PDO::PARAM_STR);
            $sql->bindParam(":birthdate", $birthdate, PDO::PARAM_STR);
            $sql->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $sql->bindParam(":rg", $rg, PDO::PARAM_STR);
            $sql->bindParam(":phone", $phone, PDO::PARAM_STR);
            $sql->execute();
            return "Client has been created";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function list():array {
        try {
            $sql = $this->database->query("SELECT * FROM clients");

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return [];
        } catch(Exception $e) {
            return [ "errors" => $e->getMessage() ];
        }
    }

    public function show($id):array {
        try {
            $sql = $this->database->prepare("SELECT * FROM clients WHERE id = :id");
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
            $name = $this->getName();
            $birthdate = $this->getBirthdate();
            $cpf = $this->getCPF();
            $rg = $this->getRG();
            $phone = $this->getPhone();

            $sql = $this->database->prepare("UPDATE clients SET name = :name, birthdate = :birthdate, cpf = :cpf, rg = :rg, phone = :phone WHERE id = :id");
            $sql->bindParam(":name", $name, PDO::PARAM_STR);
            $sql->bindParam(":birthdate", $birthdate, PDO::PARAM_STR);
            $sql->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $sql->bindParam(":rg", $rg, PDO::PARAM_STR);
            $sql->bindParam(":phone", $phone, PDO::PARAM_STR);
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            $sql->execute();
            return "Client has been updated";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function remove($id):string {
        try {
            $sql = $this->database->prepare("DELETE FROM clients WHERE id = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            $sql->execute();
            return "Client has been removed";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
