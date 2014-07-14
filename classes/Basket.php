<?php

class Basket {

    public static function activeButton($sess_id) {
        if (isset($_SESSION['basket'][$sess_id])) {
            $id = 0;
            $label = "Remove from basket";
        } else {
            $id = 1;
            $label = "Add to basket";
        }
        $out = "<a href=\"#\" class=\"add_to_basket";
        $out.=$id == 0 ? " red" : null;
        $out.="\" rel=\"";
        $out.=$sess_id . "_" . $id;
        $out.="\">{$label}</a>";
        return $out;
    }

}
