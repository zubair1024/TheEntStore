<?php

class Business extends Application{
    private $_table= 'business';
    public function getBusiness(){
        $sql= "SELECT * FROM business";
        return $this->db->fetchOne($sql);
    }
    public function getVatRate(){
        
    }
}