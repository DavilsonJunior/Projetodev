<?php 
session_start();
if(!empty($_SESSION['login'])) {
    header("Location: index.php");
} 
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Perfis Blindados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css"> 
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet"> 
    </head>
    <body> 
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="menu">

            <a class="navbar-brand h1 mb-0 menu" href="index.php">
                <img class="d-inline-block align-top" src="assets/images/logo.jpg" height="70">
            </a>                         
            
        </nav>

        <div class="banner">
                <div class="container">
                    <div class="login description">            
                
                        <form action="verifica.login.php" method="POST">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>                        
                            </div> 
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input type="password" class="form-control" name="senha" id="senha">
                                </div>                       
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <button class="btn btn-primary p-2" type="submit">Acessar</button>
                                </div>
                            </div> 
                            <div class="formAlert">
                        
                                                
                            </div>                           
                            
                        </form>
                        
                    </div>  
                    
                </div>
                

<?php require 'pages/footer.php' ?>        