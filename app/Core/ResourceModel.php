<?php
namespace AHT\Core;

use AHT\Config\Database;

class ResourceModel implements IResourceModel
{
    protected $tableName;

    // init 
    public function __init($table){
        $this->tableName = $table;
        return $this->tableName;
    }

    // add to database function
    public function add($data)
    {
        $set = "";
        $value_insert = "";

        foreach ($data as $key => $value) {
            $set .= "`$key`,";
            $value_insert .= "'$value',";
        }

        $set = substr_replace($set, "", -1);
        $value_insert = substr_replace($value_insert, "", -1);

        $query = "INSERT INTO $this->tableName($set) VALUES ($value_insert)";

        $req = Database::getBdd()->prepare($query);

        return $req->execute();
    }

    // edit data in database by id
    public function edit($id, $data)
    {
        $set = "";

        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }

        $set = substr_replace($set, "", -2);
        $query = "UPDATE $this->tableName SET $set WHERE id = $id";
        echo $query;
        $req = Database::getBdd()->prepare($query);
        return $req->execute();
    }

    // get data in database
    public function get($data)
    {
        $where = '';

        foreach ($data as $colName => $value) {
            $where .= " `$colName` = $value and";
        }

        $where = substr($where, 0, strlen($where) - 3);
        $query = "SELECT * FROM $this->tableName WHERE $where";
        $req = Database::getBdd()->prepare($query);
        $req->execute();
        return $req->fetch();
    }

    // delete data in database by id
    public function delete($id)
    {
        $query = "DELETE FROM $this->tableName WHERE id = $id";
        $req = Database::getBdd()->prepare($query);
        return $req->execute();
    }

    // get all data from database
    public function getAll()
    {
        $query = "SELECT * FROM $this->tableName";
        $req = Database::getBdd()->prepare($query);
        $req->execute();
        return $req->fetchAll();
    }
}
