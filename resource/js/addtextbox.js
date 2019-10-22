$(document).ready(function() {
    $("#Add").on("click", function() {
        $("#textboxDiv").append("<tr><td><input type='text' class='form-control' name='subjects[]' placeholder='Enter Subject' required ><input type='number' class='form-control' name='units[]' placeholder='Enter Number of units' required></td></tr>");
    });
    $("#Remove").on("click", function() {
        $("#textboxDiv").children().last().remove();
    });
});
