$(document).ready(function () {

    //adiciona borda no menu mobile  
    $('.container-fluid button').bind('click', function(){
        $("ul li").toggleClass("borda");

    });    

    //Faço uma requisição Ajax de todo fórmulario
    $('#form').bind('submit', function(e) {
        e.preventDefault();

        var email = $('input[name=email]').val();
        var senha = $('input[name=password]').val();

        $.ajax({
            type: 'post',
            url: 'verifica.login.php',
            data: {email:email, senha:senha},
            success: function(data) {
                $('.msg').html(data);
                
            },
            error: function() {
                alert("Ocorreu um erro!");
            }            
        });
    });
    
});