$(document).ready(function() {
    function refreshSmallBasket() {
        $ajax({
            url: '/mod/basket_small_refresh.php',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(k, v) {
                    $("#basket_left ." + k + "span").text(v);
                });
            },
            error: function(data){
                alert("ERROR OCCURED");
            }
        });
    }
    if ($(".add_to_basket").length > 0) {
        var tigger = $("this");
        var param = tigger.attr("rel");
        var item = param.split("_");
        $.ajax({
            type: 'POST',
            url: '/mod/basket.php',
            dataType: 'json',
            data: ({id: item[0], job: item[1]}),
            success: function(data) {

            },
            error: function(data) {
                alert("EORROR OCCURED");
            }
        });
        return false;
    }
});