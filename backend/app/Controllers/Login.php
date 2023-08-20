<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Firebase\JWT\JWT;

class Login extends BaseController
{
    public function index()
    {
        // https://www.binaryboxtuts.com/php-tutorials/codeigniter-4-json-web-tokenjwt-authentication/

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            'iss' => 'Issuer of JWT',
            'aud' => 'Audience of JWT',
            'sub' => 'Subject of JWT',
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
