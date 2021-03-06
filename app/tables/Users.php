<?php

namespace App\Tables;

use App\Connections\Database;
use App\Interfaces\Table;
class Users implements Table
{
    public $conn;
    public $tableName = 'users';

    public function __construct()
    {
       $this->conn = Database::Conection();
    }

    public function createTable(): int
    {
        $verify = $this->conn->exec(
            "CREATE TABLE `$this->tableName`(
                id INT NOT NULL AUTO_INCREMENT,
                admin BOOLEAN,
                email VARCHAR(50),
                password VARCHAR(50),
                PRIMARY KEY ( id )
            )"
        );

        if($verify === false)
            return 'Erro ao criar tabela Users';
        else
            return $verify;
        
    }
}