<?php
namespace src\Controllers;

use src\Models\Clients;

class ClientsController extends Clients {
    public function __construct() {
        parent::__construct();
    }

    public function new():string {
        // Verificar se já existe com o mesmo e-mail ou CPF.
        return $this->create();
    }
}
