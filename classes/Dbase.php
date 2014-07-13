<?php

class Dbase {

    private $_host = "localhost";
    private $_user = "root";
    private $_password = "";
    private $_name = "ecommercee";
    private $_conndb = false;
    public $_last_query = null;
    public $_affected_rows = 0;
    public $_insert_keys = array();
    public $_insert_values = array();
    public $_update_sets = array();
    public $_id;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->_conndb = mysqli_connect($this->_host, $this->_user, $this->_password,  $this->_name);
        if (!$this->_conndb) {
            die("Database Connection Failed<br>" . mysqli_error());
        } else {
            $_select = mysqli_select_db($this->_conndb, $this->_name);
            if (!$_select) {
                die("Database Selection Failed<br>" . mysqli_error());
            }
        }
        mysqli_set_charset($this->_conndb, "utf8");
    }

    public function close() {
        if (!mysqli_close($this->_conndb)) {
            die("Closing Connection Failed!");
        }
    }

    public function escape($value) {
        if (function_exists("mysql_real_escape_string")) {
            if (get_magic_quotes_gpc()) {
                $value = stripslashes($value);
            }
            $value = mysqli_real_escape_string($value);
        } else {
            if (!get_magic_quotes_gpc()) {
                $value = addcslashes($value);
            }
        }
        return value;
    }

    public function query($sql) {
        $this->_last_query = $sql;
        $result = mysqli_query($this->_conndb, $sql);
        $this->displayQuery($result);
        return $result;
    }

    public function displayQuery($result) {
        if (!$result) {
            $output = "Database Query Failed: " . mysqli_error($this->_conndb) . "<br>";
            $output .="Last SQL query was:" . $this->_last_query;
            die($output);
        } else {
            $this->_affected_rows = mysqli_affected_rows($this->_conndb);
        }
    }

    public function fetchAll($sql) {
        $result = $this->query($sql);
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[] = $row;
        }
        mysqli_free_result($result);
        return $out;
    }

    public function fetchOne($sql) {
        $out = $this->fetchAll($sql);
        return array_shift($out);
    }

    public function lastId() {
        return mysqli_insert_id($this->_conndb);
    }

}
