<?php

class User {
    // Connection
    private $conn;
    // Table
    private $db_table = 'login';
    // Columns
    public $id;
    public $nome;
    public $nascimento;
    public $telefone;

    // Db connection

    public function __construct( $db ) {
        $this->conn = $db;
    }
    // GET ALL

    public function getUsers() {
        $sqlQuery = 'SELECT id, nome, nascimento, telefone FROM ' . $this->db_table . '';
        $stmt = $this->conn->prepare( $sqlQuery );
        $stmt->execute();
        return $stmt;
    }

    //CREATE

    public function createUser() {
        $sqlQuery = 'INSERT INTO' . $this->db_table . '
            SET 
                nome = :nome, 
                nascimento = :nascimento,
                telefone = :telefone
            '
        ;

        $stmt = $this->conn->prepare( $sqlQuery );

        // Sanitiza avoid sql injection
        $this->nome = htmlspecialchars( strip_tags( $this->nome ) );
        $this->nascimento = htmlspecialchars( strip_tags( $this->nascimento ) );
        $this->telefone = htmlspecialchars( strip_tags( $this->telefone ) );

        // bind data
        $stmt->bindParam( ':nome', $this->nome );

        $stmt->bindParam( ':nascimento', $this->nascimento );

        $stmt->bindParam( ':telefone', $this->telefone );

        if ( $stmt->execute() ) {
            return true;
        }

        return false;
    }
    // READ single

    public function getSingleUser() {
        $sqlQuery = "SELECT
                id, 
                nome, 
                nascimento, 
                telefone
              FROM
                ". $this->db_table ."
            WHERE 
               id = ?
            LIMIT 0,1";

        $stmt = $this->conn->prepare( $sqlQuery );
        $stmt->bindParam( 1, $this->id );
        $stmt->execute();
        $dataRow = $stmt->fetch( PDO::FETCH_ASSOC );

        $this->nome = $dataRow[ 'nome' ];
        $this->nascimento = $dataRow[ 'nascimento' ];
        $this->telefone = $dataRow[ 'telefone' ];

    }

    //UPDATE

    public function updateUser() {
        $sqlQuery = 'UPDATE' . $this->db_table . '
            SET 
                nome = :nome, 
                nascimento = :nascimento,
                telefone = :telefone
            WHERE
                id = :id
            '
        ;

        $stmt = $this->conn->prepare( $sqlQuery );

        // Sanitiza avoid sql injection
        $this->nome = htmlspecialchars( strip_tags( $this->nome ) );
        $this->nascimento = htmlspecialchars( strip_tags( $this->nascimento ) );
        $this->telefone = htmlspecialchars( strip_tags( $this->telefone ) );

        // bind data
        $stmt->bindParam( ':nome', $this->nome );

        $stmt->bindParam( ':nascimento', $this->nascimento );

        $stmt->bindParam( ':telefone', $this->telefone );

        if ( $stmt->execute() ) {
            return true;
        }

        return false;
    }

    // DELETE

    function deleteUser() {
        $sqlQuery = 'DELETE FROM ' . $this->db_table . ' WHERE id = ?';
        $stmt = $this->conn->prepare( $sqlQuery );

        $this->id = htmlspecialchars( strip_tags( $this->id ) );

        $stmt->bindParam( 1, $this->id );

        if ( $stmt->execute() ) {
            return true;
        }
        return false;
    }

}