<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";



$id= isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');



require ('../function/db/config.php');

$sql = "select * from pacientes
  where id = '".$id."%'";
$stmt = $pdo->query($sql); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);

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
               


               <section class="invoice-view-wrapper">


                <div class="row">
                <div class="card">

                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#"><i class="bx bx-home"></i>Principal</a></li>
                                                <li class="breadcrumb-item"><a href="paciente_list.php">Pacientes</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
                                            </ol>
                                        </nav>
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">
                                                                        <img src="../app-assets/images/pages/paciente.png" alt="logo" height="100" width="100">
                                                                    </div>
                                                                    <div class="col-12 col-sm-9">
                                                                        <div class="row">
                                                                            <div class="col-12 text-center text-sm-left">
                                                                               
                                                                                <h4 class="text-primary"><i class="bx bxs-user"></i><?php echo $row['nome'] ?><i class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h4>
                                                                                
                                                                            </div>
                                                                            <div class="col-12 text-center text-sm-left">
                                                                               
                                                                                <h5 class="invoice-from">Estado Clínico: 
                                                     
                                                     <?php 

                                                     if($row['estado']=="Moderado"){

                                                       echo'<span class="text-primary">
                                                        <div class="spinner-grow text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                                        Moderado</span>';
                                                        }

                                                        if($row['estado']=="Grave"){

                                                       echo'<span class="text-warning">
                                                        <div class="spinner-grow text-warning" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                                        Grave</span>';
                                                        }

                                                        if($row['estado']=="Critico"){

                                                       echo'<span class="text-danger">
                                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                                        Critico</span>';
                                                        
                                                        }

                                                         if($row['estado']=="Alta"){

                                                       echo'<span class="text-success">
                                                        <div class="spinner-grow text-success" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                                        Alta</span>';
                                                        
                                                        }

                                                        if($row['estado']=="Obito"){

                                                       echo'<span class="text-dark">
                                                        <div class="spinner-grow text-dark" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                                        Óbito</span>';
                                                        
                                                        }
                    ?>

                                                    
                                                </h5>
                                                                                
                                                                            </div>
                                                                            <div class="col-12 text-center text-sm-left">
                                                                                <div class="mb-1">
                                                                                    <span class="mr-1"><?php echo $row['idade'] ?> <small>Anos</small></span>
                                                                                    <span class="mr-1"><?php echo $row['genero'] ?></span>
                                                                                    <span class="mr-1"><?php echo $row['etnia'] ?></span>
                                                                                </div>
                                                                                <p>Data Enternamento: <?php echo $row['data_internamento'] ?></p>
                                                                                <p><?php                                                          
                     echo "

                            <a class='btn btn-sm float-center btn-success' href='paciente_edit.php?id=".$row['id']."'><i class='bx bxs-edit-alt'></i> Editar Paciente </a>";

                            ?></p>
                      
                    
                                                                                </button>
                                                                                
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                </div>

 </section>


                <section id="collapsible">

                   
<div class="collapsible collapse-icon accordion-icon-rotate">
                        <div class="card collapse-header">
                            <div id="headingCollapse5" class="card-header alert alert-dark" data-toggle="collapse" role="button" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                <span class="collapse-title">
                                    <i class="bx bx-first-aid align-middle"></i>
                                    <span class="align-middle">Infomação Clínica</span>
                                </span>
                            </div>
                            <div id="collapse5" role="tabpanel" aria-labelledby="headingCollapse5" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="pb-0 pl-0"><strong>Diagnostico</strong></td>
                                                        <td class="pb-0 pl-0"><strong>Comorbidade</strong></td>
                                                        <td class="pb-0"><strong>Proveniencia</strong></td>
                                                        <td class="pb-0"><strong>Medicação</strong></td>
                                                        <td class="pb-0"><strong>Quarto</strong></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-0">
                                                           <?php echo $row['diagnostico'] ?>
                                                        </td>
                                                        <td class="pl-0">
                                                            <?php echo $row['comorbidade'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['proveniencia'] ?>
                                                        </td>
                                                        <td>N/A</td>
                                                        <td><?php echo $row['quarto'] ?></td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="collapsible collapse-icon accordion-icon-rotate">
                        <div class="card collapse-header">
                            <div id="headingCollapse6" class="card-header alert alert-dark" data-toggle="collapse" role="button" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                <span class="collapse-title">
                                    <i class='bx bx-user-circle align-middle'></i>
                                    <span class="align-middle">Infomação do paciente</span>
                                </span>
                            </div>
                            <div id="collapse6" role="tabpanel" aria-labelledby="headingCollapse6" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="pb-0 pl-0"><strong>Idade</strong></td>
                                                        <td class="pb-0 pl-0"><strong>Genero</strong></td>
                                                        <td class="pb-0"><strong>Etnia</strong></td>
                                                        <td class="pb-0"><strong>Endereço</strong></td>
                                                        <td class="pb-0"><strong>Contacto Familiar</strong></td>
                                                        <td class="pb-0"><strong>Grau Parentesco</strong></td>
                                                        <td class="pb-0"><strong>Profissão</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-0">
                                                           <?php echo $row['idade'] ?>
                                                        </td>
                                                        <td class="pl-0">
                                                            <?php echo $row['genero'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['etnia'] ?>
                                                        </td>
                                                        <td><?php echo $row['endereco'] ?></td>
                                                        <td><?php echo $row['contacto_familiar'] ?></td>
                                                        <td><?php echo $row['grau_familiar'] ?></td>
                                                        <td><?php echo $row['profissao'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

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