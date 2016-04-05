
$('#login_button').on('click',function(e){
    e.preventDefault();
    $('#errors_email').html('');
    $('#errors_password').html('');
    $('#errors_wronginfo').html('');
    $.ajax({
        'url': '/check/login',
        'data': {
            'email' : $('#email').val(),
            'password' : $('#password').val()
        },
        'dataType': 'json',
        'success': function(responce){
            console.log(responce);
            if (Object.keys(responce.errors).length > 0) {
                $.each(responce.errors, function( index, value ) {
                    $('#' + index ).html(value);
                });
            } else {
                window.location.reload();
            }
        },
        'error' : function(a, b, c){
            console.log(b);
        }
    })
})
