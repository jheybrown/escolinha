<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";
require ('../function/paciente/add.php');

$genero_error = $_POST['genero'];

?>



   
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                                             
                       
                        
                    </div>
                    <div class="row">
                        
                   
                    </div>
                    <div class="row">
                        <!-- Task Card Starts -->
                        
                        
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

                <section id="default-breadcrumb">
                    <div class="row">
                        <div class="col-12">
<?php
addPaciente();
?>

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
                                                <li class="breadcrumb-item active" aria-current="page">Novo Paciente</li>
                                            </ol>
                                        </nav>
                                       
                                        

                                        <form class="form needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                    <div class="alert alert-dark  col-12" role="alert">
                                            Infomação do paciente
                                        </div>
                                           <div class="row">
                                                    
                                            
                                                    <div class="col-sm-8">
                                                        <label for="validationTooltip01">Nome Completo</label>
                                                    <input type="text" name="nome" class="form-control" id="validationTooltip01" value = "<?php echo isset($_POST['nome']) ? $_POST['nome'] : '' ?>" placeholder="Nome Completo" required>
                                                    
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                <h6>Genero</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="genero" id="basicSelect">
                                                        <option value="NA" <?php echo (isset($_POST['genero']) && $_POST['genero'] == 'NA') ? 'selected' : ''; ?>>Seleccionar...</option>
                                                        
                                                        <option value="Masculino" <?php echo (isset($_POST['genero']) && $_POST['genero'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                                                        <option value="Feminino" <?php echo (isset($_POST['genero']) && $_POST['genero'] == 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="emailAddress1">Idade</label>
                                                            <select class="form-control" name="idade" id="basicSelect">
                                                                <option value="NA">Seleccionar...</option>
                                                        <?php

for( $i=1; $i<=11; $i++)
{
echo '<option value="'.$i.'M"';

echo (isset($_POST['idade']) && $_POST['idade'] == $i) ? 'selected' : '';

echo '>'.$i.'M</option>';
}

for( $i=1; $i<=100; $i++)
{
echo '<option value="'.$i.'"';

echo (isset($_POST['idade']) && $_POST['idade'] == $i) ? 'selected' : '';

echo '>'.$i.'</option>';
}
?>
                                                        
                                                    </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Profissão</label>
                                                            <input type="text" name="profissao" class="form-control" value = "<?php echo isset($_POST['profissao']) ? $_POST['profissao'] : '' ?>" id="firstName13" placeholder="...">
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Etnia</label>
                                                            <select class="form-control" name="etnia" id="basicSelect">
                                                        <option value="NA">Seleccionar...</option>
                                                        <option value="Negro" <?php echo (isset($_POST['etnia']) && $_POST['etnia'] == 'Negro') ? 'selected' : ''; ?>>Negro</option>
                                                        <option value="Branco" <?php echo (isset($_POST['etnia']) && $_POST['etnia'] == 'Branco') ? 'selected' : ''; ?>>Branco</option>
                                                    </select>
                                                        </div>
                                                    </div>
                                                                                                     
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Contacto Familiar</label>
                                                            <input type="number" name="contacto_familiar" class="form-control" value = "<?php echo isset($_POST['contacto_familiar']) ? $_POST['contacto_familiar'] : '' ?>" id="firstName13" placeholder="8X XXX XXXX" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Grau Parentesco</label>
                                                            <input type="text" name="grau_parentesco" class="form-control" id="firstName13" value = "<?php echo isset($_POST['grau_parentesco']) ? $_POST['grau_parentesco'] : '' ?>" placeholder="Pai, Mãe, 
                                                            Filha, Filho ...">
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Endereço</label>
                                                            <input type="text" name="endereco" class="form-control" value = "<?php echo isset($_POST['endereco']) ? $_POST['endereco'] : '' ?>" id="firstName13" placeholder="Rua X, Bairro X ...">
                                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            

                                                    <div class="alert alert-dark col-12" role="alert">
                                            Infomação Clínica
                                        </div>

                                        <div class="row">
                                                    
                                            
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Diagnóstico </label>
                                                            <input type="text" name="diagnostico" class="form-control" value = "<?php echo isset($_POST['diagnostico']) ? $_POST['diagnostico'] : '' ?>" id="firstName13" placeholder="...">
                                                        </div>
                                                    </div>
                                                   <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Comorbidade </label>
                                                            <input type="text" value = "<?php echo isset($_POST['comorbidade']) ? $_POST['comorbidade'] : '' ?>" name="comorbidade" class="form-control" id="firstName13" placeholder="...">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                <h6>Proveniência</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="proveniencia" id="basicSelect">
                                                        <option value="NA">Seleccionar...</option>
                <?php
require ('../function/db/config.php');
try {

    $sql = "SELECT nome FROM proveniencia ORDER BY id ASC";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
        extract($row);
    echo "<option value='{$nome}'";

echo (isset($_POST['proveniencia']) && $_POST['proveniencia'] == $row['nome']) ? 'selected' : '';

    echo ">{$nome}</option>";                
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

                ?>                                                    </select>
                                                </fieldset>
                                            </div>
                                                </div>

                <div class="row">
                                                    
                                            
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Data Internamento </label>
                                                            <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="data_internamento" value = "<?php echo isset($_POST['data_internamento']) ? $_POST['data_internamento'] : '' ?>" class="form-control pickadate" placeholder="Data de Entrada">
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
                                                        <option value="NA">Seleccionar...</option>
                                                            <?php
require ('../function/db/config.php');
try {

    $sql = "SELECT nome FROM quarto ORDER BY id ASC";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
        extract($row);
    echo "<option value='{$nome}'";

echo (isset($_POST['quarto']) && $_POST['quarto'] == $row['nome']) ? 'selected' : '';

    echo ">{$nome}</option>";                
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
                                                        <option value="NA">Seleccionar...</option>
                                                            <?php
require ('../function/db/config.php');
try {

    $sql = "SELECT nome FROM ventilacao ORDER BY id ASC";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
        extract($row);
    echo "<option value='{$nome}'";

echo (isset($_POST['ventilacao']) && $_POST['ventilacao'] == $row['nome']) ? 'selected' : '';

    echo ">{$nome}</option>";                
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
                                                    
                                                    <div class="badge badge-warning mr-1 mb-1">Estado Clinico</div>
                                            
                                                    <div class="col-sm-12">
                                                         <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input bg-primary" name="estado" id="customColorRadio2" value="Moderado">
                                                        <label class="custom-control-label" for="customColorRadio2">Moderado</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input bg-warning" name="estado" id="customColorRadio3" value="Grave">
                                                        <label class="custom-control-label" for="customColorRadio3">Grave</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input bg-danger" name="estado" id="customColorRadio4" value="Critico">
                                                        <label class="custom-control-label" for="customColorRadio4">Crítico</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                                    </div>
                                                  
                                                   
                                                </div>

                                                  <div class="row text-center">
                                            <div class="col-12">
                                                <!-- Buttons with Icon -->
                                                
                                                <button type="submit" name="submit" class="btn btn-success glow mr-1 mb-1"><i class="bx bx-check"></i>
                                                    <span class="align-middle ml-25">Adicionar</span></button> 
                                               
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