<?php

require_once ("../inc/autoload.php");
if (isset($_POST['job']) && isset($_POST['id'])) {
    $out = array();
    $job = $_POST['job'];
    $id = $_POST['id'];
    $objCatalog = new $objCatalog();
    $product = $objCatalog->getProduct($id);
    switch ($job) {
        case 0:
            Session::removeItem($id);
            $out['job']=1; 
            break;
        case 1:
            Session::setItem($id);
            $out['job']=0; 
            break;
    }
    echo json_encode($out);
}
