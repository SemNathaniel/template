<?php
require_once('db.functions.php');
class db extends dbFunctions {

    public $response = '';

    public static function selectSqlFunction($sql){
        return (new dbFunctions)->selectFunction($sql);
    }

    public static function otherSqlFunction($sql){
        return self::$response = (new dbFunctions)->sqlFunction($sql);
    }
}
?>