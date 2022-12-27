<?php

//database wrapper
class Database
{ //data dari database yang ada dalam file config
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;                   //database handlerr (untuk menampung koneksi ke databse)
    private $stmt;                  //untuk menyimpan query

    public function __construct()
    {
        // Data source name (koneksi ke PDO)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
          

        //optimasi koneksi ke database
        $options = [
            //Supaya databasenya konek terus
            PDO::ATTR_PERSISTENT => true,
            // set the PDO error mode to exception
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        if ($this->dbh == null) {
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {                                        // set the PDO error mode to exception
                die($e->getMessage());
            }
        }
    }
    

    //method untuk menjalankan query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
     

    //binding data
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        //Fungsi ini mengikat parameter ke queri SQL dan memberi tahu database apa saja parameternya.
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Bind multiple parameters
     */
    public function binds($paramValue)
    {
        foreach ($paramValue as $param => $value) {
            $type = null;
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }

            $this->bind($param, $value, $type);
        }
    }


    //eksekuasi query
    public function execute()
    {
        $this->stmt->execute();
    }

    //eksekusi query jika datanya banyak
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);  //digunakan untuk mengambil baris hasil sebagai array asosiatif.
    }



    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function numRows()
    {
        $this->execute();
        return $this->stmt->fetchColumn();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}


//database wrapper bisa kita pakai di tabel manapun