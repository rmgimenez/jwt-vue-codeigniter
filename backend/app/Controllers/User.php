<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        return $this->response->setJSON(['Acesso permitido' => true]);
    }
}
