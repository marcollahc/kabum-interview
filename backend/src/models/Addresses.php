<?php
namespace src\Models;

use PDO;
use src\Models\Database;

class Addresses extends Database {
    private $database;
    private $id;
    private $client_id;
    private $street;
    private $number;
    private $complement;
    private $district;
    private $city;
    private $state_province;
    private $country;
    private $zipcode;

    public function __construct() {
        parent::__construct();
        $this->database = parent::getConnection();
    }

    public function getId():int {
        return $this->id;
    }

    public function setId(int $id):void {
        $this->id = $id;
    }

    public function getClientId():int {
        return $this->client_id;
    }

    public function setClientId(int $client_id):void {
        $this->client_id = $client_id;
    }

    public function getStreet():string {
        return $this->street;
    }

    public function setStreet(string $street):void {
        $this->street = $street;
    }

    public function getNumber():string {
        return $this->number;
    }

    public function setNumber(string $number):void {
        $this->number = $number;
    }

    public function getComplement():string {
        return $this->complement;
    }

    public function setComplement(string $complement):void {
        $this->complement = $complement;
    }

    public function getDistrict():string {
        return $this->district;
    }

    public function setDistrict(string $district):void {
        $this->district = $district;
    }

    public function getCity():string {
        return $this->city;
    }

    public function setCity(string $city):void {
        $this->city = $city;
    }

    public function getStateProvince():string {
        return $this->state_province;
    }

    public function setStateProvince(string $state_province):void {
        $this->state_province = $state_province;
    }

    public function getCountry():string {
        return $this->country;
    }

    public function setCountry(string $country):void {
        $this->country = $country;
    }

    public function getZipcode():string {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode):void {
        $this->zipcode = $zipcode;
    }

    public function create():string {
        try {
            $street = $this->getStreet();
            $number = $this->getNumber();
            $complement = $this->getComplement();
            $district = $this->getDistrict();
            $city = $this->getCity();
            $state_province = $this->getStateProvince();
            $country = $this->getCountry();
            $zipcode = $this->getZipcode();
            $client_id = $this->getClientId();

            $sql = $this->database->prepare("INSERT INTO addresses (street, number, complement, district, city, state_province, country, zipcode, client_id) VALUES (:street, :number, :complement, :district, :city, :state_province, :country, :zipcode, :client_id)");
            $sql->bindParam(":street", $street, PDO::PARAM_STR);
            $sql->bindParam(":number", $number, PDO::PARAM_STR);
            $sql->bindParam(":complement", $complement, PDO::PARAM_STR);
            $sql->bindParam(":district", $district, PDO::PARAM_STR);
            $sql->bindParam(":city", $city, PDO::PARAM_STR);
            $sql->bindParam(":state_province", $state_province, PDO::PARAM_STR);
            $sql->bindParam(":country", $country, PDO::PARAM_STR);
            $sql->bindParam(":zipcode", $zipcode, PDO::PARAM_STR);
            $sql->bindParam(":client_id", $client_id, PDO::PARAM_INT);
            $sql->execute();
            return "Address has been created";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function list():array {
        try {
            $sql = $this->database->query("SELECT * FROM addresses");

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return [];
        } catch(Exception $e) {
            return [ "errors" => $e->getMessage() ];
        }
    }

    public function listByClientId($id):array {
        try {
            $sql = $this->database->prepare("SELECT * FROM addresses WHERE client_id = :client_id");
            $sql->bindParam(":client_id", $id, PDO::PARAM_INT);
            $sql->execute();

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
            $sql = $this->database->prepare("SELECT * FROM addresses WHERE id = :id");
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
        $street = $this->getStreet();
        $number = $this->getNumber();
        $complement = $this->getComplement();
        $district = $this->getDistrict();
        $city = $this->getCity();
        $state_province = $this->getStateProvince();
        $country = $this->getCountry();
        $zipcode = $this->getZipcode();
        $client_id = $this->getClientId();

        try {
            $sql = $this->database->prepare("UPDATE addresses SET street = :street, number = :number, complement = :complement, district = :district, city = :city, state_province = :state_province, country = :country, zipcode = :zipcode, client_id = :client_id WHERE id = :id");
            $sql->bindParam(":street", $street, PDO::PARAM_STR);
            $sql->bindParam(":number", $number, PDO::PARAM_STR);
            $sql->bindParam(":complement", $complement, PDO::PARAM_STR);
            $sql->bindParam(":district", $district, PDO::PARAM_STR);
            $sql->bindParam(":city", $city, PDO::PARAM_STR);
            $sql->bindParam(":state_province", $state_province, PDO::PARAM_STR);
            $sql->bindParam(":country", $country, PDO::PARAM_STR);
            $sql->bindParam(":zipcode", $zipcode, PDO::PARAM_STR);
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            $sql->bindParam(":client_id", $client_id, PDO::PARAM_INT);
            $sql->execute();
            return "Address has been updated";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function remove($id):string {
        try {
            $sql = $this->database->prepare("DELETE FROM addresses WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            return "Address has been removed";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function removeByClientId($id):string {
        try {
            $sql = $this->database->prepare("DELETE FROM addresses WHERE client_id = :client_id");
            $sql->bindParam(":client_id", $id, PDO::PARAM_INT);
            $sql->execute();
            return "Address addresses has been removed";
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
