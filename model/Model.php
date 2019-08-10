<?php
namespace Model;
use Model\Database;

class Model
{
    protected $database;
    protected $table;
    public function __construct()
    {
        $this->database = Database::connect();
    }
    public function insert($values)
    {
        
        $sql  = "INSERT INTO $this->table(";
        $sql .= implode(",", array_keys($values));
        $sql .= ") VALUES (:".implode(", :", array_keys($values)).")";
        
        $insert = $this->database->prepare($sql);
        $result = $insert->execute($values);

        return $result;
        

    }
    public function select($fields)
    {
        $sql  = "SELECT ".implode(", ", array_values($fields));
        $sql .= " FROM $this->table"; 
        
        $select = $this->database->prepare($sql);
        $select->execute();
        
        $result = $select->fetchAll();

        return $result;    
    }
    
    public function selectWhere($whereField, $whereValue)
    {
        $sql = "SELECT * FROM $this->table WHERE $whereField = '$whereValue' ";
        
        $selectWhere = $this->database->prepare($sql);
      
        $selectWhere->execute();
        $result      = $selectWhere->fetch();

        return $result;
        
    }
    public function delete($whereField, $whereValue)
    {
        $sql = "DELETE FROM $this->table WHERE $whereField = :val";
        
        $delete = $this->database->prepare($sql);
        $delete->bindValue(":val", $whereValue);

        $result = $delete->execute();
        
        return $result;
    }
    public function update($whereField, $whereValue, array $formValues)
    {
        $sql           = "UPDATE $this->table SET";
        
        foreach ($formValues as $key => $value) {
            $sql .= " $key = :".$key.",";
            
        }
        $sql = rtrim($sql, ",");
        $sql .= " WHERE $whereField = $whereValue  ";
     
        $update = $this->database->prepare($sql);
        $result = $update->execute($formValues);
        return $result;
    }
}