<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";
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
                                    <h4 class="card-title"><i class="bx bx-user-circle"></i>Gestão de Pacientes</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home"></i>Principal</a></li>
                                                
                                                <li class="breadcrumb-item active" aria-current="page">Paciente</li>   
                                                <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
    <a href="paciente_add.php" class="btn btn-success glow mr-1 mb-1"><i class="bx bxs-user-plus"></i>
                                                    <span class="align-middle ml-25">Novo</span></a>
  </li>
 </ul>
                                            </ol>

                                           
                                       
                                        </nav>
                                       

                                        
                                        
         
                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped dataex-html5-selectors">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Nome</th>
                                                        <th>Genero</th>
                                                        <th>Idade</th>
                                                        <th>Diagnostico</th>
                                                        <th>Comorbidade</th>
                                                        <th>Estado</th>
                                                        <th>Accao</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
require ('../function/db/config.php');
try {

  $sql = "
  select *
  from
  pacientes
  where estado not in ('Obito', 'Alta', 'Transferido')
  and deleted_record <> 'SIM'
  and data_internamento > (NOW() - INTERVAL 24 HOUR)
  order by id desc
  ";
 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
                        echo "<tr>";
                            
                            
                            echo "<td>

                            <a target='_blank' href='paciente_detalhes.php?id=".$row['id']."'> ".$row['nome']." </a></td>";
                            echo "<td>".$row['genero']."</td>";
                            echo "<td>".$row['idade']."</td>";
                            echo "<td>".$row['diagnostico']."</td>";
                            echo "<td>".$row['comorbidade']."</td>";
                            



                                                     if($row['estado']=="Moderado"){

                                                       echo'<td><span class="text-primary">
                                                        <div class="spinner-grow text-primary" role="status">
                                            <span class="sr-only"></span>
                                            </div>
                                                        Moderado</span></td>';
                                                        }
                                                        if($row['estado']=="Grave"){

                                                       echo'<td><span class="text-warning">
                                                        <div class="spinner-grow text-warning" role="status">
                                            <span class="sr-only"></span>
                                            </div>
                                                        Grave</span></td>';
                                                        }
                                                        if($row['estado']=="Critico"){

                                                       echo'<td><span class="text-danger">
                                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="sr-only"></span>
                                        </div>
                                                        Critico</span></td>';  
                                                        }
                  

                            echo "<td>
                            <a target='_blank' href='paciente_edit.php?id=".$row['id']."' class='text-success'><i class='bx bxs-edit-alt'></i></a> 
                            <a data-emp-id='".$row['id']."' href='javascript:void(0)' class='text-danger delete_paciente'><i class='bx bx-x'></i></a>
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