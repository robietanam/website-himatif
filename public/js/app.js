"use strict";

// function
const openFile = function(event, element) {
    const input = event.target;
    const label = $(event.target).next();
    const reader = new FileReader();
    const strfile = $(event.target)[0].files[0].name;

    let strfilesplit = strfile.split('.');
    let strname = strfile.length > 10 ? strfile.slice(0, 10) + '..' : strfile;
    let strext = strfilesplit[strfilesplit.length-1];
    reader.onload = function() {
        const dataURL = reader.result;
        const output = document.querySelector(element);
        label.text(strname+strext)
        output.src = dataURL;
    }
    reader.readAsDataURL(input.files[0])
}

$(function() {
    // datepicker date
    if ($('.form-control-calendar').length) {
        $(".form-control-calendar").datepicker({ format: "dd-mm-yyyy", autoclose: true });
    }
    // datepicker date
    if ($('.form-control-year').length) {
        $(".form-control-year").datepicker({ 
            changeMonth: false,
            changeYear: true,
            format: "yyyy", 
            autoclose: true,
            startView: "years", 
            minViewMode: "years"
        });
    }
})