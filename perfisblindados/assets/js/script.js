$(document).ready(function () {       
     
    //Faz uma requisição Ajax de todo fórmulario de login
    $('#form').on('submit', function(e) {
        e.preventDefault();
        var email = $('input[name=email]').val();
        var senha = $('input[name=senha]').val();

        $.ajax({
            type: 'POST',
            url: 'verifica.login.php',
            data: {email:email, senha:senha},
            success: function(data) {
                if(data === 'sucesso') {
                    window.location.href = 'index.php';                    
                } else {
                    $('.formAlert').html(data);
                }
               
                
            }            
        });
    });
        
});