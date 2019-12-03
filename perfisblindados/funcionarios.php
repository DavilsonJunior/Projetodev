<?php 
session_start();
if(empty($_SESSION['login'])) {
    header("Location: login.php");
}
require 'pages/header.php'; 
include '../c0nf1g-43394390493.php';
require 'classes/funcionario.class.php';

$indices = array('Nome', 'E-mail', 'Perfis', 'Informação'); 
$total = 0;
$sql = "SELECT COUNT(*) as c FROM funcio";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['c'];
$por_pagina = 10;
$paginas = ceil($total / $por_pagina);

$p = 0;
$pg = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
    $pg = addslashes($_GET['p']);
}
$p = ($pg - 1) * $por_pagina; 
$busca = '';
if(isset($_POST['busca']) && !empty($_POST['busca'])) {

    $busca = $_POST['busca'];
       
} 

?>

<div class="container">
    <div class="descriptionx"> 
        <h1 class="my-4">Funcionários</h1>                           
                
        <form class="mb-4" action="funcionarios.php" method="POST" id="buscar">
            <div class="form-row">
                <input type="text" class="col-3 form-control mr-3" name="busca" placeholder="Buscar" id="busca" value="<?php echo $busca; ?>">                   <button class="btn btn-primary" type="submit">Buscar</button>       
            </div> 
                                                 
        </form>

        <?php
         $funcionarios = new Funcionario($pdo);
         $dados = $funcionarios->getFuncionario($p, $por_pagina, $busca);
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
                        <td><?php echo $dado['name'] ?></td>
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
            $p = 1;
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $p = $_GET['p'];
            }
            
             for($q = 1; $q <= $paginas; $q++) { ?>
                <li class="page-item <?php echo ($p==$q)?'active':'' ?> "><a class="page-link" href="./funcionarios.php?<?php
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

