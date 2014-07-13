<?php

class Business extends Application {

    private $_table = 'business';

    public function getBusiness() {
        $sql = "SELECT * FROM `{$this->_table}`
				WHERE `id` = 1";
        return $this->db->fetchOne($sql);
    }

    public function getVatRate() {
        
    }

}
