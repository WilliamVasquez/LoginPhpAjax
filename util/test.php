<?php
    /*function encriptar($PASSWORD){
        $salt = random_bytes(24);
        $salt = substr(strtr(base64_encode($salt), '+', '.'), 0, 24);
        $hash = crypt($PASSWORD, '$2y$10$'.$salt);
        return $hash;
    }
    $war = encriptar($pass);
    echo $war.'['.strlen($war).']<br>';*/
    $pass = '1234';
    $options = [
        'memory_cost' => 5120,
        'time_cost'   => 4,
        'threads'     => 3
    ];
    $hash = password_hash($pass, PASSWORD_ARGON2ID, $options);
    echo $hash.'<br>';    
    if (password_verify('1234', $hash))
        echo 'Es correcta tu contraseña';
    else
        echo 'No es correcta tu contraseña';
?>