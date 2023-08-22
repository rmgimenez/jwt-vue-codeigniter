<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Firebase\JWT\JWT;

class Login extends BaseController
{
    // variável que armazena a key do JWT
    private $key;

    // variável que armazena o tipo de algorítimo utilizado
    private $algorithm;

    // construtor da classe
    public function __construct()
    {
        $this->key = getenv('JWT_SECRET');
        $this->algorithm = 'HS256';
    }

    public function index()
    {
        // https://www.binaryboxtuts.com/php-tutorials/codeigniter-4-json-web-tokenjwt-authentication/

        $user = $this->request->getVar('user');
        $password = $this->request->getVar('password');

        // fazer a validação de usuário e senha
        if (($user == '555' && $password == '123456') == false) {
            return $this->response->setJSON(['error' => 'Invalid username or password.']);
        }

        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            'iss' => 'Issuer of JWT',
            'aud' => 'Audience of JWT',
            'sub' => 'Token de acesso',
            'iat' => $iat,
            'exp' => $exp,
            'user' => '555',
        ];

        $token = JWT::encode($payload, $this->key, $this->algorithm);

        $response = [
            'message' => 'Success',
            'token' => $token,
        ];

        return $this->response->setJSON($response);
    }

    // verifica se o token enviado via post é valido
    public function isValidToken()
    {
        $token = $this->request->getVar('token');
        $decoded = JWT::decode($token, $this->key, null);
        return $this->response->setJSON($decoded);
    }
}
