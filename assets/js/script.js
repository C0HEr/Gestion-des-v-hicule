$( document ).ready(function() {
    $("form input[type='submit'],form button[type='submit']").on('click',function(e){
       // e.preventDefault();
        var isNull;
        $(this).parents().find('form input').each(function() {
            if($(this).val() == '' ) {
                isNull = true;
                if(!$(this).hasClass('is-error')) {
                    $(this).addClass('is-error');
                    $(this).parent().append("<span class='error-msg'>Le champ "+$(this).parent().find('label').text() +" est required. </span>");
                }
            } else if($(this).val() != '') {
                $(this).removeClass('is-error');
                $(this).parent().find('.error-msg').remove();
            }
            
            if($(this).val() != '' && $(this).attr('isNum') == 'true' && (!/^[0-9]*$/.test($(this).val()))) {
                isNull = true;
                $(this).addClass('is-error');
                $(this).parent().append("<span class='error-msg'> Entre le bonne valeur.</span>");
            }
        });

        if(isNull) {
            e.preventDefault();
        }
    })
});