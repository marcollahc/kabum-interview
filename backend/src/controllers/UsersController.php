<?php
namespace src\Controllers;

use src\Models\Users;

class UsersController extends Users {
    public function __construct() {
        parent::__construct();
    }

    public function new():string {
        if (count(parent::find()) < 1) {
            return parent::create();
        } else {
            return "User already registered";
        }
    }

    public function createSession():string {
        // Verificar se já foi criada, se sim, destroí a anterior e cria uma nova.
    }
}
