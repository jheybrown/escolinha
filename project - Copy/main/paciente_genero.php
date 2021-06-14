<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";

$genero= isset($_GET['genero']) ? $_GET['genero'] : die('ERROR: Record ID not found.');



?>




?>
    <!-- BEGIN: Main Menu-->
    
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
        




                <section id="default-breadcrumb">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><i class="bx bx-user-circle"></i>Pacientes - <span class="text-info"> <?php echo $genero ?> </span></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home"></i>Principal</a></li>
                                                
                                                <li class="breadcrumb-item active" aria-current="page">Paciente</li>   
                                                <ul class="navbar-nav ml-auto">
  
 </ul>
                                            </ol>

                                           
                                       
                                        </nav>
                                       

                                        
                                        
         
                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped zero-configuration">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Nome</th>
                                                        <th>Genero</th>
                                                        <th>Idade</th>
                                                        <th>Diagnostico</th>
                                                        <th>Comorbidade</th>
                                                        
                                                        <th>Accao</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
require ('../function/db/config.php');


try {

 $sql = "select * from pacientes
where genero = '".$genero."'";

 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
                        echo "<tr>";
                            
                            
                            echo "<td>

                            <a href='paciente_detalhes.php?id=".$row['id']."'> ".$row['nome']." </a></td>";
                            echo "<td>".$row['genero']."</td>";
                            echo "<td>".$row['idade']."</td>";
                            echo "<td>".$row['diagnostico']."</td>";
                            echo "<td>".$row['comorbidade']."</td>";
                           echo "<td>
                            <a href='paciente_edit.php?id=".$row['id']."' class='text-success'><i class='bx bxs-edit-alt'></i></a>
                            <a href='#' class='text-danger'><i class='bx bx-x'></i></a>
                            </td>";
                        echo "</tr>";
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
                                                    
                                                </tbody>
                                              
                                            </table>
                                        </div>
                                    </div>
                    </div>
                </section>





                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               




                



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