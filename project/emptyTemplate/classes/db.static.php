<?php
require_once('db.functions.php');
class db extends dbFunctions {

    //turn dbFunctions's functions into usable static functions
    public static function selectSqlFunction($sql){
        return (new dbFunctions)->selectFunction($sql);
    }

    public static function otherSqlFunction($sql){
        return (new dbFunctions)->sqlFunction($sql);
    }
}
?>