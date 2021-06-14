<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";


$id= isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
require ('../function/db/config.php');

$sql = "select * from pacientes
  where id = '".$id."'";
$stmt = $pdo->query($sql); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>



   
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                
                <!-- Dashboard Analytics end -->

                <section id="default-breadcrumb">
                    <div class="row">

<?php
$user = $_SESSION['nome'];
$current_time=date('Y-m-d H:i:s');
if(isset($_POST['submit']))
{

$idd=$_POST['id'];
$diagnostico=$_POST['diagnostico'];
$estado=$_POST['estado'];
$ventilacao=$_POST['ventilacao'];
$nome = $_POST['nome'];
$completo = $nome . " " . $apelido;
$genero = $_POST['genero'];
$idade = $_POST['idade'];
$profissao = $_POST['profissao'];
$comorbidade = $_POST['comorbidade'];
$endereco = $_POST['endereco'];
$contacto_familiar = $_POST['contacto_familiar'];
$grau_familiar = $_POST['grau_parentesco'];
$etnia = $_POST['etnia'];


//SEM estado clinico
$sql_update = "UPDATE pacientes
         SET
            diagnostico = :diagnostico,
            comorbidade = :comorbidade,
            estado = :estado,
            update_user = :user,
            ventilacao=:ventilacao,
            nome=:nome,
            genero=:genero,
            idade = :idade,
            profissao=:profissao,
            endereco=:endereco,
            contacto_familiar = :contacto_familiar,
            grau_familiar=:grau_familiar,
            etnia=:etnia
            where id= :id"
            ;
//COM ESTADO CLINICO             
$sql_estado = "UPDATE pacientes
         SET
            diagnostico = :diagnostico,
            comorbidade = : comorbidade,
            estado = :estado,
            update_status = :current_time,
            update_user = :user,
            ventilacao=:ventilacao,
            nome=:nome,
            genero=:genero,
            idade = :idade,
            profissao=:profissao,
            endereco=:endereco,
            contacto_familiar = :contacto_familiar,
            grau_familiar=:grau_familiar,
            etnia=:etnia
            where id= :id"
            ;

if($_POST['estado'] <> $row['estado']){
  $stmt_update = $pdo->prepare($sql_estado);
  $stmt_update->bindParam(':id', $idd);                                  
$stmt_update->bindParam(':diagnostico', $diagnostico);
$stmt_update->bindParam(':comorbidade', $comorbidade);
$stmt_update->bindParam(':estado', $estado);
$stmt_update->bindParam(':current_time', $current_time);
$stmt_update->bindParam(':user', $user);
$stmt_update->bindParam(':ventilacao', $ventilacao);
$stmt_update->bindParam(':nome', $nome);        
$stmt_update->bindParam(':genero', $genero); 
$stmt_update->bindParam(':idade', $idade); 
$stmt_update->bindParam(':profissao', $profissao); 
$stmt_update->bindParam(':endereco', $endereco); 
$stmt_update->bindParam(':contacto_familiar', $contacto_familiar); 
$stmt_update->bindParam(':grau_familiar', $grau_familiar); 
$stmt_update->bindParam(':etnia', $etnia);    
}else{
  $stmt_update = $pdo->prepare($sql_update);
  $stmt_update->bindParam(':id', $idd);                                  
$stmt_update->bindParam(':diagnostico', $diagnostico);
$stmt_update->bindParam(':comorbidade', $comorbidade);
$stmt_update->bindParam(':estado', $estado);
$stmt_update->bindParam(':user', $user);
$stmt_update->bindParam(':ventilacao', $ventilacao);
$stmt_update->bindParam(':nome', $nome);        
$stmt_update->bindParam(':genero', $genero); 
$stmt_update->bindParam(':idade', $idade); 
$stmt_update->bindParam(':profissao', $profissao); 
$stmt_update->bindParam(':endereco', $endereco); 
$stmt_update->bindParam(':contacto_familiar', $contacto_familiar); 
$stmt_update->bindParam(':grau_familiar', $grau_familiar); 
$stmt_update->bindParam(':etnia', $etnia);    
}



if ($stmt_update->execute()) {
echo '<div class="alert alert-success" role="alert">
  Paciente actualizado com sucesso.
</div>';

echo "<script type= 'text/javascript'>setTimeout(function () {    
    window.location.href = 'dashboard.php'; 
},2000);</script>";

}
else{
echo "<script type= 'text/javascript'>alert('Erro nao inserção! Contacte o Administrador.');</script>";
}
}
?>


    
                        <div class="col-12">


                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><i class="bx bx-user-circle"></i>Gestão de Pacientes</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home"></i>Principal</a></li>
                                                <li class="breadcrumb-item"><a href="paciente_list.php">Pacientes</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Actualizar</li>
                                            </ol>
                                        </nav>
                                       
                                        

                                        <form class="form" method="POST" action="">

                                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>"  class="form-control" id="id">
                                           


                                        <section id="collapsible-with-icon">
                   
                   
                    <div class="collapsible collapse-icon accordion-icon-rotate">
                        <div class="card collapse-header">
                            <div id="headingCollapse5" class="card-header alert alert-dark" data-toggle="collapse" role="button" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                <span class="collapse-title">
                                    <i class='bx bx-user-circle align-middle'></i>
                                    <span class="align-middle">Infomação do paciente</span>
                                </span>
                            </div>
                            <div id="collapse5" role="tabpanel" aria-labelledby="headingCollapse5" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">
                                         <div class="row my-1">
                                                    
                                            
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label for="firstName13">Nome Completo </label>
                                                            <input type="text" name="nome" value="<?php echo $row["nome"] ?>"  class="form-control" id="nome" placeholder="Primeiro nome" required="" 
                                                            >
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                <h6>Genero</h6>
                                                
                                                 <fieldset class="form-group">
                                                    <select class="form-control"  name="genero" id="basicSelect">

     <?php
require ('../function/db/config.php');
try {
  $sql_g = "select * from pacientes
  where id = '".$id."%'";
$q = $pdo->query($sql_g);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($rows = $q->fetch()){
                        echo "<option value='".$rows['genero']."'>".$rows['genero']."</option>";
                     
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
</select>





                                
                                                </fieldset>
                                            </div>
                                                </div>

     <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="emailAddress1">Idade</label>
                                                            <select class="form-control" name="idade"  id="basicSelect">

                                                                <option value="<?php echo $row["idade"] ?>"><?php echo $row['idade'] ?></option>
                                                        
                                                        
                                                    </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Profissão</label>
                                                            <input type="text" name="profissao" class="form-control" value="<?php echo $row["profissao"] ?>"  id="firstName13" placeholder="...">
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Etnia</label>
                                                            <select  class="form-control" name="etnia" id="basicSelect">
                                                        <option value="Negro">Negro</option>
                                                        <option value="Branco">Branco</option>
                                                    </select>
                                                        </div>
                                                    </div>
                                                                                                     
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Contacto Familiar</label>
                                                            <input type="number" name="contacto_familiar" class="form-control" id="firstName13" value="<?php echo $row["contacto_familiar"] ?>"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Grau Parentesco</label>
                                                            <input type="text" name="grau_parentesco" class="form-control" id="firstName13" value="<?php echo $row["grau_familiar"] ?>">
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Endereço</label>
                                                            <input type="text" name="endereco" class="form-control" id="firstName13" value="<?php echo $row["endereco"] ?>" >
                                                  
                                                        </div>
                                                    </div>
                                                </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card collapse-header">
                            <div id="headingCollapse6" class="card-header alert alert-dark" data-toggle="collapse" role="button" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                <span class="collapse-title">
                                    <i class="bx bx-first-aid align-middle"></i>
                                    <span class="align-middle">Infomação Clínica</span>
                                </span>
                            </div>
                            <div id="collapse6" role="tabpanel" aria-labelledby="headingCollapse2" class="collapse show">
                                <div class="card-content">
                                    <div class="card-body">
                                         <div class="row my-1">
                                                    
                                            
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Diagnóstico </label>
                                                            <input type="text" name="diagnostico" class="form-control" id="firstName13" value="<?php echo $row["diagnostico"] ?>" >
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Comorbidade </label>
                                                            <input type="text" name="comorbidade" class="form-control" id="firstName13" value="<?php echo $row["comorbidade"] ?>" >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                <h6>Proveniência</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="proveniencia" id="basicSelect">
                                                        

                 <?php
                                                        require ('../function/db/config.php');
try {

    $sql_p = "SELECT nome FROM proveniencia ORDER BY id ASC";
    $q_p = $pdo->query($sql_p);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_p = $q_p->fetch()){
        extract($row_p);
    echo "<option value='".$row_p['nome']."'";

if($row['proveniencia']==$row_p['nome'])
{
 echo 'selected="selected"';
}

echo'>'.$row_p['nome'].'</option>';              
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
                                                        ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                                </div>

                <div class="row">
                                                    
                                            
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Data Internamento </label>
                                                            <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="data_internamento" value="<?php echo $row["data_internamento"] ?>" class="form-control pickadate" placeholder="Seleccionar">
                                            <div class="form-control-position">
                                                <i class='bx bx-calendar'></i>
                                            </div>
                                        </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                <h6>Quarto</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="quarto" id="basicSelect">
                                                        <?php
                                                        require ('../function/db/config.php');
try {

    $sql_k = "SELECT nome FROM quarto ORDER BY id ASC";
    $q_k = $pdo->query($sql_k);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_k = $q_k->fetch()){
        extract($row_k);
    echo "<option value='".$row_k['nome']."'";

if($row['quarto']==$row_k['nome'])
{
 echo 'selected="selected"';
}

echo'>'.$row_k['nome'].'</option>';              
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
                                                        ?>
                                                        
                                                    </select>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-4">
                                                <h6>Ventilação</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="ventilacao" id="basicSelect">
                                                        <?php
                                                        require ('../function/db/config.php');
try {

    $sql_v = "SELECT nome FROM ventilacao ORDER BY id ASC";
    $q_v = $pdo->query($sql_v);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row_v = $q_v->fetch()){
        extract($row_k);
    echo "<option value='".$row_v['nome']."'";

if($row['ventilacao']==$row_v['nome'])
{
 echo 'selected="selected"';
}

echo'>'.$row_v['nome'].'</option>';              
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
                                                        ?>
                                                        
                                                    </select>
                                                </fieldset>
                                            </div>
                                              
                                                    
                                                </div>
                                                <br>
                                                <div class="row justify-content-center text-center">
                                                    
                                                    <div class="badge badge-secondary mr-1 mb-1">Estado Clinico</div>
                                            
                                                    <div class="col-sm-12">
                                                         <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                <div class="radio radio-primary radio-glow">
                                                        <input type="radio" id="radioGlow1" name="estado" value="Moderado"
                                                        <?php
                                                        if($row["estado"]=="Moderado"){
                                                            echo "checked";
                                                        }
                                                        ?>

                                                        >
                                                        <label for="radioGlow1" class="text-primary">Moderado</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-warning radio-glow">
                                                        <input type="radio" id="radioGlow2" name="estado" value="Grave"
                                                        <?php
                                                        if($row["estado"]=="Grave"){
                                                            echo "checked";
                                                        }
                                                        ?>
                                                        >
                                                        <label for="radioGlow2" class="text-warning">Grave</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-danger radio-glow">
                                                        <input type="radio" id="radioGlow3" name="estado" value="Critico"
                                                        <?php
                                                        if($row["estado"]=="Critico"){
                                                            echo "checked";
                                                        }
                                                        ?>
                                                        >
                                                        <label for="radioGlow3" class="text-danger">Crítico</label>
                                                    </div>
                                                </fieldset>
                                            </li>

                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-success radio-glow">
                                                        <input type="radio" id="radioGlow4" name="estado" value="Alta"
                                                        <?php
                                                        if($row["estado"]=="Alta"){
                                                            echo "checked";
                                                        }
                                                        ?>
                                                        >
                                                        <label for="radioGlow4" class="text-success">Alta</label>
                                                    </div>
                                                </fieldset>
                                            </li>

                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-dark radio-glow">
                                                        <input type="radio" id="radioGlow5" name="estado" value="Obito"
                                                        <?php
                                                        if($row["estado"]=="Obito"){
                                                            echo "checked";
                                                        }
                                                        ?>
                                                        >
                                                        <label for="radioGlow5" class="text-dark">Óbito</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary radio-glow">
                                                        <input type="radio" id="radioGlow6" name="estado" value="Transferido"
                                                        <?php
                                                        if($row["estado"]=="Transferido"){
                                                            echo "checked";
                                                        }
                                                        ?>
                                                        >
                                                        <label for="radioGlow6" class="text-primary">Transferido</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                                    </div>
                                                  
                                                   
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        
                    </div>
                </section>



                                       

                                                  <div class="row text-center">
                                            <div class="col-12">
                                                <!-- Buttons with Icon -->
                                                
                                                <button type="submit" name="submit" class="btn btn-success glow mr-1 mb-1"><i class="bx bx-check"></i>
                                                    <span class="align-middle ml-25">Actualizar</span></button> 
                                               
                                            </div>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




                



            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- demo chat-->
 
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-left d-inline-block">2021 &copy; PGC</span><span class="float-right d-sm-inline-block d-none">Desenvolvido<i class="bx bxs-heart pink mx-50 font-small-3"></i>por<a class="text-uppercase" href="https://1.envato.market/pixinvent_portfolio" target="_blank">MozAds MultiService</a></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->

<?php
include "../theme/layout/footer.php";
?>
 

</body>
<!-- END: Body-->

</html>