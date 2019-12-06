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

    //Faz uma requisição Ajax para adicionar Funcionario ou Usuario
    $('#adicionar').on('submit', function(e){
        e.preventDefault();

        var nome = $('input[name=nome]').val();
        var email = $('input[name=email]').val();
        var senha = $('input[name=senha]').val();

        if($('#funcionario').is(':checked')) {
            var pessoa = 'funcio';
        } 
        if ($('#usuario').is(':checked')) {
            var pessoa = 'usuarios';
        }
        if ($('#venda').is(':checked')) {
            var pessoa = 'vendas';
        }

        $.ajax({
            type: 'POST',
            url: 'add-pessoa.php',
            data: {pessoa:pessoa, nome:nome, email:email, senha:senha},
            success: function(mensagem) {                              
                $('.msgAdd').html(mensagem);
            }         
        });
    });

    //Faz uma requisição Ajax para adicionar uma Venda
    $('#adicionarVenda').on('submit', function(e){
        e.preventDefault();

        var nome = $('input[name=nome]').val();
        var email = $('input[name=email]').val();
        var celular = $('input[name=celular]').val();

        if($('#Venda').is(':checked')) {
            var pessoa = 'vendas';
        } 

        $.ajax({
            type: 'POST',
            url: 'add-venda.php',
            data: {pessoa:pessoa, nome:nome, email:email, celular:celular},
            success: function(mensagem) {                              
                $('.msgAdd').html(mensagem);
            }         
        });
    });

    //Faz uma requisição Ajax de da busca por email ou nome
    
       
       /* var busca = $('input[name=busca]').val();

        $('input[name=busca]').on('keyup', function() {
            var busca = $(this).val();

            $.ajax({
                type: 'POST',
                url: 'busca.php',
                data: {busca:busca},
                success: function(data) {                              
                    $('.testei').html(data)
                }            
            });
        });*/
        
    
        
});