<?php


class Database
{


    private $db_name;
    private $db_host;
    private $db_user;
    private $db_password;
    private $pdo;
    protected $fetch = PDO::FETCH_OBJ;
    private $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];


    public function __construct($db_name, $db_host, $db_user, $db_password)
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;

    }

    public function connect()
    {

        try {
            $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_password, $this->options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo = $pdo;
        } catch (PDOException $e) {
            die("Erreur:" . $e->getMessage());
        }
        return $this;
    }

    public function insert($data, $table)
    {
        $datas = [];
        foreach ($data as $key => $value) {
            $datas[] = $value;
        }
        $query = $this->pdo->prepare('INSERT INTO ' . $table . '(title,slug,content,online,category_id,author_id) VALUES(?,?,?,?,?,?)');
        $query->execute($datas);


    }

    public function select($column = ['*'], $table, $model, $limit = null)
    {
        $column = $column == false ? '*' : $column;
        $query = $this->pdo->query('SELECT ' . $column . ' FROM ' . $table . ' LEFT JOIN categories  ON posts.category_id = categories.id LEFT JOIN users ON posts.author_id = users.id ORDER BY '.$table.'.id DESC' . $limit);
        $query->execute();
        $results = $query->fetchAll($this->fetch);
        return $model->bind($results);
    }

    public function selectCount($column, $table)
    {
        $query = $this->pdo->query("SELECT COUNT($column) AS tautal FROM $table");
        $query->execute();
        $result = $query->fetch();
        return (int)$result->tautal;
    }

    public function selectOne($column,$table){
        $query = $this->pdo->prepare('SELECT * FROM '.$table.' WHERE id = ? ');
        $query->execute([$column]);
        return $query->fetch();
     }
     public function check($value,$table,$field){
         $query = $this->pdo->prepare('SELECT * FROM '.$table.' WHERE '.$field.' = ?');
         $query->execute([$value]);
        return $result = $query->fetch();
     }

}