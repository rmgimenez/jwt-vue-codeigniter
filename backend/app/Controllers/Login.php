<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Firebase\JWT\JWT;

class Login extends BaseController
{
    public function index()
    {
        // https://www.binaryboxtuts.com/php-tutorials/codeigniter-4-json-web-tokenjwt-authentication/

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // fazer a validação de usuário e senha
        if (($email == 'teste@teste.com' && $password == '123456') == false) {
            return $this->response->setJSON(['error' => 'Invalid username or password.']);
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            'iss' => 'Issuer of JWT',
            'aud' => 'Audience of JWT',
            'sub' => 'Token de acesso',
            'iat' => $iat,
            'exp' => $exp,
            'email' => 'testep@example.com',
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'message' => 'Success',
            'token' => $token,
        ];

        return $this->response->setJSON($response);
    }
}
