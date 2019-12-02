$(document).ready(function () {      

     //altera css do menu nav quando a pagina der um scroll maior do que 50
     $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
         $("#menu").addClass("menu-diferente");
         $("nav ul li a").addClass("nav-color");
        } else {
         $("#menu").removeClass("menu-diferente");
         $("nav ul li a").removeClass("nav-color");
        }
      });

    //Faço uma requisição Ajax de todo fórmulario
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