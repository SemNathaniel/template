<?php
class dbFunctions {

    //define variables
    public $result = '';
    public $dbcon = '';

    //define functions
    public function __construct(){
        if(!empty(DBHOST) && !empty(DBUSER) && !empty(DBNAME)){
           $this->dbcon = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        }
        if(!empty($this->dbcon->connect_error)){
            $error = $this->dbcon->connect_error;
            error_log($error . date('l jS \of F Y h:i:s A'), 3, DIRPATH . 'errorLog.txt');
            echo errorMsg::$connectDb;
            die();
        } else {
        }
    }

    protected function selectFunction($sql){
        if(!empty($sql)){
            $sql = trim($sql);
            try{$this->result = $this->dbcon->query($sql);
                if($this->result->num_rows > 0){
                    $records = $this->result->fetch_all();
                    if(!empty($records)){
                        return $records;
                    }
                } else {
                    return array(false ,'No records found');
                }
            } catch(Exception $error) {
                return array(false, errorMsg::$sql . error_log($error . date('l jS \of F Y h:i:s A'), 3, DIRPATH . 'errorLog.txt'));
            }
        } else {
            return array(false, 'no query given');
        }
    }

    protected function sqlFunction(){
        if(!empty($sql)){
            $sql = trim($sql);
            try{
                if($this->dbcon->query($sql)){
                    return array(true);
                }
            } catch(Exception $error){
                return array(false, errorMsg::$sql . error_log($error . date('l jS \of F Y h:i:s A'), 3, DIRPATH . 'errorLog.txt'));
            }
        } else {
            return array(false, 'no query given');
        }
    }   
}
?>