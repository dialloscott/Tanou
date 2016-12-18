<?php


class Model
{

    protected $config = [];
    protected $connection;
    protected $table;
    protected $attr;

    public function __construct()
    {
        $this->bootConfig();

    }

    private function bootConfig()
    {
        $config = require BASE_PATH . '/config/config.php';
        $this->config = $config;

    }

    public function connection()
    {
        $db = new Database($this->config['db_name'], $this->config['db_host'], $this->config['db_user'], $this->config['db_password']);
        $this->connection = $db->connect();
        return $this->connection;


    }

    public function getConnection()
    {
        return $this->connection;
    }

    protected function getTable()
    {
        $table = get_called_class();

        $this->table = strtolower($table) . 's';
        return $this->table;
    }

    public function create($data = [])
    {
        $database = $this->connection();
        $database->insert($data, $this->getTable());
        return $this;
    }

    public function all()
    {
        $database = $this->connection();
        $database->select(false, $this->getTable(), $this);
        return $this;
    }

    public function bind($attr)
    {
        $this->attr = $attr;

    }

    public function get()
    {
        return $this->attr;
    }

    public function count($column)
    {
        $connection = $this->connection();
        return $connection->selectCount($column, $this->getTable());
    }
    public function paginate($limit){
        $connection = $this->getConnection();
        $connection->select(false, $this->getTable(), $this,$limit);
        return $this->attr;
    }
    public function find($id){
       $connection = $this->connection();
        $record = $connection->selectOne($id,$this->getTable());
        return $record;
    }
    public function check($value,$field){
       $connection = $this->connection();
        return $connection->check($field,$this->getTable(),$value);
    }


}