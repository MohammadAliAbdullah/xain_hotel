"use strict";
$(document).ready(function() {
    $('#printdatadiv').hide();
    $('#parkingdetails').hide();
});

 // select print button with class "print," then on click run callback function
$.print(".print-carparking"); // inside callback function the section with class "content" will be printed;