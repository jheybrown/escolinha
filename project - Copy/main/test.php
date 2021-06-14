<?php
include "../theme/layout/header.php";


function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'covid';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to database!');
    }
}

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $diagnostico = isset($_POST['diagnostico']) ? $_POST['diagnostico'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE pacientes SET id = ?, diagnostico = ? WHERE id = ?');
        $stmt->execute([$id, $diagnostico, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>




   
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
            
                <!-- Dashboard Analytics end -->

                <section id="default-breadcrumb">
                    <div class="row">
                         <input type="text" name="id" value="<?php echo $contact["id"] ?>"  class="form-control" id="id" placeholder="Primeiro nome">                    
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><i class="bx bx-user-circle"></i>Gestão de Pacientes</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#"><i class="bx bx-home"></i>Principal</a></li>
                                                <li class="breadcrumb-item"><a href="paciente_list.php">Pacientes</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Novo Paciente</li>
                                            </ol>
                                        </nav>
                                       
                                        

                                        <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                    <div class="alert alert-dark  col-12" role="alert">
                                            Infomação do paciente
                                        </div>
                                           <div class="row">
                                                    
                                            
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Primeiro nome </label>
                                                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Primeiro nome" 
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="lastName12">Apelido</label>
                                                            <input type="text" name="apelido" class="form-control" id="lastName12" placeholder="Apelido">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                <h6>Genero</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="genero" id="basicSelect">
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Feminino">Feminino</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="emailAddress1">Idade</label>
                                                            <select class="form-control" name="idade" id="basicSelect">
                                                        <?php
for( $i=1; $i<=100; $i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
                                                        
                                                    </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Profissão</label>
                                                            <input type="text" name="profissao" class="form-control" id="firstName13" placeholder="...">
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Etnia</label>
                                                            <select class="form-control" name="etnia" id="basicSelect">
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
                                                            <input type="number" name="contacto_familiar" class="form-control" id="firstName13" placeholder="8X XXX XXXX">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Grau Parentesco</label>
                                                            <input type="text" name="grau_parentesco" class="form-control" id="firstName13" placeholder="Pai, Mãe, Filha, Filho ...">
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Endereço</label>
                                                            <input type="text" name="endereco" class="form-control" id="firstName13" placeholder="Rua X, Bairro X ...">
                                                  
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
                                                            <input type="text" name="diagnostico" class="form-control" id="firstName13" placeholder="...">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                <h6>Comorbidade</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="comorbidade" id="basicSelect">
                                                        <option value="HTA">HTA</option>
                                                        <option value="Asma">Asma</option>
                                                        <option value="Diabete">Diabete</option>
                                                        <option value="Outro">Outro</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                                    <div class="col-md-4">
                                                <h6>Proveniência</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="proveniencia" id="basicSelect">
                                                            <option value="Casa">Casa</option>
                <option value="H_Central_Maputo">H_Central_Maputo</option>          
                <option value="H_Geral_Mavalane">H_Geral_Mavalane</option>
                <option value="H_Jose_Macamo">H_Jose_Macamo</option>
                <option value="Outros">Outros</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                                </div>

                <div class="row">
                                                    
                                            
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Data Internamento </label>
                                                            <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="data_internamento" class="form-control pickadate" placeholder="Select Date">
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
                                                        <option value="Quarto1">Quarto1</option>
                                                        <option value="Quarto2">Quarto2</option>
                                                        <option value="Quarto3">Quarto3</option>
                                                        
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
                                                
                                                <button type="submit" class="btn btn-success glow mr-1 mb-1"><i class="bx bx-check"></i>
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