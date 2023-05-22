<?php
    require('../config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);
    if($method === 'post') {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        if($email && $password) {
            $query = $pdo->prepare('
                SELECT  id
                FROM    user
                WHERE   email = :email AND
                        password = :password
            ');
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $query->execute();

            if($query->rowCount() > 0) {
                $now = new DateTime();
                $token = md5($now->getTimestamp());
                $query = $pdo->prepare('
                    UPDATE user
                    SET token = :token
                    WHERE email = :email
                ');
                $query->bindValue(':token', $token);
                $query->bindValue(':email', $email);
                $query->execute();
                $array['result'] = [
                    'token' => $token
                ];
            } else {
                $array['error'] = 'Erro de usuário e/ou senha.';
            }
        } else {
            $array['error'] = 'Favor informar um e-mail!';
        }
    } else {
        $array['error'] = 'Método não permitido para esta operação';
    }

    require('../response.php');