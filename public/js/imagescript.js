"use strict";
$(function () {
    var fileupload = $("#FileUpload1");
    var filePath = $("#spnFilePath");
    var image = $("#imgFileUpload");
    image.click(function () {
        fileupload.click();
    });
    fileupload.change(function () {
        var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
        filePath.html("<b>Selected: </b>" + fileName);
        var output = document.getElementById('imgFileUpload');
        output.src = URL.createObjectURL(event.target.files[0]);
    });
});
$(document).ready(function(){
    $("img").addClass("img-fluid");
});