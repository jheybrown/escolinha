<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";
require ('../function/student/add.php');

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
                                    <h4 class="card-title"><i class="bx bx-body"></i>Gestão de Alunos</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home"></i>Principal</a></li>
                                                <li class="breadcrumb-item"><a href="student_list.php">Alunos</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Novo Aluno</li>
                                            </ol>
                                        </nav>
                                       
                                        

                                        <form class="form needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                    <div class="alert alert-dark  col-12" role="alert">
                                            Infomação Geral
                                        </div>
                                           <div class="row">
                                                    
                                            
                                                    <div class="col-sm-8">
                                                        <label for="validationTooltip01">Nome Completo</label>
                                                    <input type="text" name="sname" class="form-control" id="validationTooltip01" placeholder="Nome Completo" required>
                                                    
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                <h6>Genero</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="sgender" id="basicSelect">
                                                        
                                                        
                                                        <?php
require ('../function/db/config.php');
try {

    $sql = "SELECT name FROM gender ORDER BY id ASC";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
        extract($row);
    echo "<option value='{$name}'";
    echo ">{$name}</option>";                
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
                                                            <label for="firstName13">Data Nascimento </label>
                                                            <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="sdob" value = "<?php echo isset($_POST['sdob']) ? $_POST['sdob'] : '' ?>" class="form-control pickadate" placeholder="Seleccionar">
                                            <div class="form-control-position">
                                                <i class='bx bx-calendar'></i>
                                            </div>
                                        </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Contacto</label>
                                                            <input type="number" name="scontact" class="form-control" value = "<?php echo isset($_POST['profissao']) ? $_POST['profissao'] : '' ?>" id="firstName13" placeholder="8XXXXXXXX">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">Residência</label>
                                                            <input type="text" name="saddress" class="form-control" value = "<?php echo isset($_POST['profissao']) ? $_POST['profissao'] : '' ?>" id="firstName13" placeholder="...">
                                                        </div>
                                                    </div>
                                                                                                     
                                                </div>

                                                <div class="row">
                                                <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="firstName13">E-mail</label>
                                                            <input type="email" name="semail" class="form-control" value = "<?php echo isset($_POST['profissao']) ? $_POST['profissao'] : '' ?>" id="firstName13" placeholder="aluno@escola.co.mz">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                <h6>Classe</h6>
                                                
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="classname" id="basicSelect">
                                                        <option value="NA">Seleccionar...</option>
                <?php
require ('../function/db/config.php');
try {

    $sql = "SELECT name FROM class ORDER BY id ASC";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
        extract($row);
    echo "<option value='{$name}'";

echo (isset($_POST['classname']) && $_POST['classname'] == $row['name']) ? 'selected' : '';

    echo ">{$name}</option>";                
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

                ?>                                                    </select>
                                                </fieldset>
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