<?php

class Catalog extends Application {

    private $_table = 'categories';

    public function getCategories() {
        $sql = "SELECT * FROM `{$this->_table}`
				ORDER BY `name` ASC";
        return $this->db->fetchAll($sql);
    }

}
