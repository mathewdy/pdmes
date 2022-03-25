$(document).ready(function(){  
    var form_count = 1, previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;  
    $(".next-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().next();
        next_form.show();
        previous_form.hide();
    });  
    $(".previous-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().prev();
        next_form.show();
        previous_form.hide();
    });

    $( "#register_form" ).submit(function(event) {    
    var error_message = '';
        if(!$(".form-control").val()) {
            error_message+="All fields must be filled.";
        }
        if(!$(".form-select").val()) {
            error_message+="<br>Please choose a gender";
        }
        if(error_message) {
            $('.alert-danger').removeClass('d-none').html(error_message);
            return false;
        } else {
            return true;	
        }    
    });  
    var maxChar = 12;
    $('#input').keydown( function(e){
        if ($(this).val().length >= maxChar) { 
            $(this).val($(this).val().substr(0, maxChar));
        }
    });
    
    $('#input').keyup( function(e){
        if ($(this).val().length >= maxChar) { 
            $(this).val($(this).val().substr(0, maxChar));
        }
    });
});

$(document).ready(function(){  
    var form_count = 1, previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;  
    $(".next-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().next();
        next_form.show();
        previous_form.hide();
    });  
    $(".previous-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().prev();
        next_form.show();
        previous_form.hide();
    }); 
});