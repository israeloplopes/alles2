<?php

  namespace App\Db;

  use \PDO;
  use \PDOException;

  class Database{
    const Host = 'nonoelemento.com.br';
    const Name = 'nonoelem_allesdesktop';
    const User = 'nonoelem_israel';
    const Pass = 'px4b7470#ISA';

    private $table;

    private $connection;

    public function __construct($table = null){
      $this->table = $table;
      $this->setConnection();
    }

    private function setConnection(){
      try{
        $this->connection = new PDO('mysql:host='.self::Host.';dbname='.self::Name,self::User,self::Pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        die('Error '.$e->getMessage());
      }
    }

   public function execute($query, $params =[]){
      try{
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
      }catch(PDOException $e){
        die('Error '.$e->getMessage());
      }
    }

    public function insert($values){
      $fields = array_keys($values);
      $binds  = array_pad([],count($fields),'?');
      $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') values ('.implode(',',$binds).')';

      $this->execute($query, array_values($values));
      return $this->connection->lastInsertId();
    }

    public function update($where, $values){
      $fields = array_keys($values);
      $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? where '.$where;
      /*echo $query;
      exit;*/
      $this->execute($query,array_values($values));
      return true;
    }

    public function delete($where){
      $query = 'Delete from '.$this->table.' where '.$where;
      $this->execute($query);
      return true;
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
      //DADOS DA QUERY
      $where = strlen($where) ? 'WHERE '.$where : '';
      $order = strlen($order) ? 'ORDER BY '.$order : '';
      $limit = strlen($limit) ? 'LIMIT '.$limit : '';
      //MONTA A QUERY
      $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
      //EXECUTA A QUERY
      return $this->execute($query);
    }

  }
