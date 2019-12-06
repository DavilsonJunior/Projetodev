<?php 
session_start();
unset($_SESSION['funcio']);
unset($_SESSION['venda']);
if(empty($_SESSION['login'])) {
    header("Location: login.php");
}
require 'pages/header.php'; 
include '../c0nf1g-43394390493.php';
require 'classes/usuario.class.php';

$indices = array('Nome', 'E-mail', 'Perfis', 'Informação'); 
$total = 0;
$busca = '';
$por_pagina = 10;
$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
    $p = addslashes($_GET['p']);
}
 
if(!isset($_SESSION['usuario']) && empty($_SESSION['usuario'])) {
    $_SESSION['usuario'] = '';
}
else if(isset($_POST['busca']) && !empty($_POST['busca'])) {    
    $busca = $_POST['busca'];  
    $_SESSION['usuario'] = $busca;
    
}
else if(!isset($_POST['busca']) && empty($_POST['busca'])) {
    $busca = $_SESSION['usuario'];
}
else if(isset($_POST['busca']) && empty($_POST['busca'])) {
    $_SESSION['usuario'] = '';
}

$usuarios = new Usuario($pdo);
$total = $usuarios->getTotalUsuarios($busca);

$paginas = ceil($total / $por_pagina);

?>

<div class="container">
    <div class="description"> 
        <h1 class="my-4">Usuários</h1>                           
                
        <form class="mb-4" action="usuarios.php" method="POST" id="buscar">
            <div class="form-row">
                <input type="text" class="col-8 col-sm-6 col-md-4 col-lg-4 form-control mr-3" name="busca" placeholder="Todos" id="busca" value="<?php echo $busca; ?>">                   
                <button class="btn btn-primary" type="submit">Buscar</button>       
            </div> 
                                                 
        </form>

        <button class="btn btn-success mb-3" type="submit"><a href="pessoa.php?page=usuario">Adicionar Usuário</a></button>

        <?php
         $dados = $usuarios->getUsuarios($p, $por_pagina, $busca);
         if($dados !== null) { ?>                        
        <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <?php
                        foreach($indices as $indice):?>
                            <th style="background-color:#38344d; border:#38344d;"><?php echo $indice; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                
                <tbody>
                <?php                    
                    foreach($dados as $dado): ?>
                    <tr>
                        <td><?php echo utf8_encode($dado['name']) ?></td>
                        <td><?php echo $dado['email'] ?></td>
                        <td><?php echo $por_pagina; ?></td>
                        <td>
                            <div class="btn-group  btn-group-sm" role="group">
                                <button type="button" class="btn btn-secondary">VER VMS</button>
                                <button type="button" class="btn btn-secondary">LIBERAR PERFIS</button>
                                <button type="button" class="btn btn-secondary">DADOS</button>
                            </div>
                        </td>
                    </tr>        
                    <?php endforeach; ?>                   
                </tbody>
            </table>
            <ul class="pagination justify-content-center">
            <?php
            /*$p = 1;
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $p = $_GET['p'];
            }*/
            
             for($q = 1; $q <= $paginas; $q++) { ?>
                <li class="page-item <?php echo ($p==$q)?'active':'' ?> "><a class="page-link" href="./usuarios.php?<?php
                                $w = $_GET;
                                $w['p'] = $q;
                                echo http_build_query($w);
                            ?>"><?php echo $q ?></a></li>

                <?php
             }   
            ?>
            </ul>
            <?php
            } else {?>
                <div class="alert alert-warning text-center" role="alert">
                    Não existe dados relacionados a essa busca no sistema.
                </div>
            <?php
            }
            ?> 
        </div> 
    </div>
</div>

<?php
require 'pages/footer.php';

