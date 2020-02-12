<?php
namespace src\Controllers;

use src\Models\Addresses;

class AddressesController extends Addresses {
    public function __construct() {
        parent::__construct();
    }

    public function new():string {
        // Verificar se já existe com o mesmo CEP e número
        return $this->create();
    }

    public function destroy():string {
        $this->remove();
    }
}
