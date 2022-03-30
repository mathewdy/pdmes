$(document).ready(function(){
    var invalidInputs = ["-","+","e",]; 
    $('#grade').keydown( function(e){
        if ($(this).val().length >= maxChar) { 
            $(this).val($(this).val().substr(0, maxChar));
        }
        if (invalidInputs.includes(e.key)) {
            e.preventDefault();
        }
    });
    var maxChar = 2;
    $('#grade').keyup( function(e){
        if ($(this).val().length >= maxChar) { 
            $(this).val($(this).val().substr(0, maxChar));
        }
    });
});
