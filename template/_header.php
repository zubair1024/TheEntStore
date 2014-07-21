<?php
$objBusiness = new Business();
$business = $objBusiness->getBusiness();
$objCatalog = new Catalog();
$cats = $objCatalog->getCategories();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="../js/basket.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>The Entertainment Store</title>
        <meta name="description" content="The Entertainment Store" />
        <meta name="keywords" content="The Entertainment Store" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link href="../css/core.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="header">
            <div id="header_in">
                <h5><a href="#"><?php echo $business['name']; ?></a></h5>
            </div>
        </div>
        <div id="outer">
            <div id="wrapper">
                <div id="left">
                    <?php require_once ("basket_left.php"); ?>
                    <h2>Categories</h2>
                    <ul id="navigation">
                        <?php
                        if (!empty($cats)) {
                            foreach ($cats as $cat) {
                                echo "<li><a href=\"/TheEntStore/?page=catalog&amp;category=" . $cat['id'] . "\"";
                                echo Helper::getActive(array('category' => $cat['id']));
                                echo ">";
                                echo Helper::encodeHtml($cat['name']);
                                echo "</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div id = "right">                                