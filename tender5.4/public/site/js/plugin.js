/*global $*/

$(document).ready(function () {
    "use strict";

    $('select').material_select();
    
    $('.modal').modal();
    
    $(".button-collapse").sideNav();
    
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });
    
    $('.tooltipped').tooltip({delay: 50});
    
    $(".nav .click").onclick(function () {
        $(".nav .up").slideUp();
    });
});


