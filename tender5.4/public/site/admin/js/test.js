/*global $, console, alert*/

$(document).ready(function () {
    "use strict";
    /*$(".table img").click(function () {
        $('#myModal img').attr('src', $(this).find('img').attr('src'));
    });*/
    $('.table img').click(function () {
        $('#myModal img').attr('src', $(this).attr('src'));
    });
});


