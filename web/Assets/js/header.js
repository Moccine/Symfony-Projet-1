$(document).ready(function () {
   var select=$('select');
   // url="";
 select.change(function () {
     $url = $(this).find('option:selected').attr('data-href');
 });
    $.ajaxSetup({
        url: "ping.php",
        type:'GET'

    });

});