                                                                                                                                                                                                                                                 z<?php
class User{
    private $_db;

    public function __construct($user = null){
        $this->_db = DB::getInstance();
    }
    public function create($fields){
        if($this->_db->insert('tbl_accounts',$fields)){
            return true;
        }else{
            return false;
        }
    }

    public function createV($fields){
        if($this->_db->insert('verifier',$fields)){
            return true;
        }else{
            return false;
        }
    }

    public function createC($fields){
        if($this->_db->insert('checker',$fields)){
            return true;
        }else{
            return false;
        }
    }
    public function createR($fields){
        if($this->_db->insert('releasedby',$fields)){
            return true;
        }else{
            return false;
        }
    }
}
 ?>
