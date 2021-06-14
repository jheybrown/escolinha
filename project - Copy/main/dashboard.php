<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";
require ('../function/db/config.php');


    $sql_total = "select count(*) total
    from
    pacientes
    where estado not in ('Obito', 'Alta', 'Transferido')
  and deleted_record <> 'SIM'";
    $stmt_total = $pdo->query($sql_total); 
    $row_total = $stmt_total->fetch(PDO::FETCH_ASSOC);

    $sql_moderado = "select count(*) total
    from
    pacientes where estado = 'Moderado'
    and deleted_record <> 'SIM'";
    $stmt_moderado  = $pdo->query($sql_moderado); 
    $row_moderado  = $stmt_moderado->fetch(PDO::FETCH_ASSOC);

    $sql_grave = "select count(*) total
    from
    pacientes where estado = 'Grave'and 
    deleted_record <> 'SIM'";
    $stmt_grave  = $pdo->query($sql_grave); 
    $row_grave  = $stmt_grave->fetch(PDO::FETCH_ASSOC);

     $sql_critico = "select count(*) total
    from
    pacientes where estado = 'Critico'and deleted_record <> 'SIM'";
    $stmt_critico  = $pdo->query($sql_critico); 
    $row_critico  = $stmt_critico->fetch(PDO::FETCH_ASSOC);

     $sql_altas = "select count(*) total
    from
    pacientes where estado = 'Alta'
    and deleted_record <> 'SIM' and
    update_status > (NOW() - INTERVAL 24 HOUR)";
    $stmt_altas  = $pdo->query($sql_altas); 
    $row_altas  = $stmt_altas->fetch(PDO::FETCH_ASSOC);

    $sql_obito = "select count(*) total
    from
    pacientes where estado = 'Obito'
    and deleted_record <> 'SIM' and
    update_status > (NOW() - INTERVAL 24 HOUR)";
    $stmt_obito  = $pdo->query($sql_obito); 
    $row_obito  = $stmt_obito->fetch(PDO::FETCH_ASSOC);

    $sql_transfer = "select count(*) total
    from
    pacientes where estado = 'Transferido' and 
    update_status > (NOW() - INTERVAL 24 HOUR)
    and deleted_record <> 'SIM'";
    $stmt_transfer  = $pdo->query($sql_transfer); 
    $row_transfer  = $stmt_transfer->fetch(PDO::FETCH_ASSOC);

    //Internados
    $sql_registo = "select count(*) total
    from
    pacientes where estado not in ('Obito', 'Alta', 'Transferido')
  and deleted_record <> 'SIM' and data_internamento > (NOW() - INTERVAL 24 HOUR)
 ";
    $stmt_registo  = $pdo->query($sql_registo); 
    $row_registo  = $stmt_registo->fetch(PDO::FETCH_ASSOC);

    $sql_h = "select count(*) total
    from
    pacientes where genero = 'Masculino'
    and estado not in ('Obito', 'Alta', 'Transferido')
    and deleted_record <> 'SIM'";
    $stmt_h  = $pdo->query($sql_h); 
    $row_h  = $stmt_h->fetch(PDO::FETCH_ASSOC);

    $sql_m = "select count(*) total
    from
    pacientes where genero = 'Feminino'
    and estado not in ('Obito', 'Alta', 'Transferido')
    and deleted_record <> 'SIM'";
    $stmt_m  = $pdo->query($sql_m); 
    $row_m  = $stmt_m->fetch(PDO::FETCH_ASSOC);
?>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                

               <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-8 mt-1 mb-2">
                            <h4>Pacientes Internados</h4>
                            <hr>
                        </div>
                        <div class="col-4 mt-1 mb-2">
                            <h4>Por Sectores</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_list.php"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-info mx-auto my-1">
                                            <i class="bx bxs-user-badge font-large-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Total</p>
                                        <h2 class="mb-0"><?php echo htmlspecialchars($row_total['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_view.php?estado=Moderado"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-primary mx-auto my-1">
                                            <i class="bx bxs-user-badge font-large-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Moderado</p>
                                        <h2 class="mb-0 text-primary"><?php echo htmlspecialchars($row_moderado['total']) ?></h2>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_view.php?estado=Grave"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-warning mx-auto my-1">
                                            <i class="bx bxs-user-badge font-large-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis text-warning">Grave</p>
                                        <h2 class="mb-0 text-warning"><?php echo htmlspecialchars($row_grave['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_view.php?estado=Critico"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-danger mx-auto my-1">
                                            <i class="bx bxs-user-badge font-large-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Critico</p>
                                        <h2 class="mb-0 text-danger"><?php echo htmlspecialchars($row_critico['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                                <div class="card-content">
                            

                                             <?php
require ('../function/db/config.php');
try {

  $sql = "
select quarto, count(*) total
from pacientes
where deleted_record <> 'SIM' 
and estado not in ('Alta', 'Obito', 'Transferido')
GROUP BY quarto
  ";
 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){
                       
echo "<a target='_blank' href='paciente_sector.php?quarto=".$row['quarto']."'><span class='float-left ml-3 '>".$row['quarto']."</span></a>";

echo "<a target='_blank' href='paciente_sector.php?quarto=".$row['quarto']."'><strong><span class='float-right mr-3 text-danger'>".$row["total"]."</span></strong><br>";





                        
     }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>


                                 </div>
                                            </div>
                        </div>
                        
                    </div>
                </section> 
                


<section id="widgets-Statistics">
                    
                    <div class="row">
                       
                       <div class="col-md-8">
                            <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Ultimas 24h</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_24.php?estado=Transferido"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-warning mx-auto my-1">
                                            <i class="bx 
bx-transfer-alt font-large-2"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Transferências</p>
                                        <h2 class="mb-0 text-warning"><?php echo htmlspecialchars($row_transfer['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="pacientes_internados.php"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-primary mx-auto my-1">
                                            <i class="bx bx-handicap font-large-2"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Internados</p>
                                        <h2 class="mb-0 text-primary"><?php echo htmlspecialchars($row_registo['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div> 
                          <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_24.php?estado=Alta"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-success mx-auto my-1">
                                            <i class="bx bxs-smiley-happy font-large-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Altas</p>
                                        <h2 class="mb-0 text-success"><?php echo htmlspecialchars($row_altas['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div> 

                         <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_24.php?estado=Obito"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-dark mx-auto my-1">
                                            <i class="bx bxs-smiley-sad font-large-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Óbito</p>
                                        <h2 class="mb-0 text-dark"><?php echo htmlspecialchars($row_obito['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div>        
                    </div>
                       </div>

                       <div class="col-md-4">
                          <div class="row">
                        <div class="mt-1 mb-2">
                            <h4>Internamento por Genero</h4>
                            <hr>
                        </div>
                    </div>
                         
                        <div class="row">
                         <div class="col-md-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_genero.php?genero=Masculino"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-primary mx-auto my-1">
                                            <i class="bx 
bx-male font-large-2"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Homens</p>
                                        <h2 class="mb-0 text-primary"><?php echo htmlspecialchars($row_h['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div> 
                          <div class="col-md-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <a href="paciente_genero.php?genero=Feminino"><div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-danger mx-auto my-1">
                                            <i class="bx 
bx-female font-large-2"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Mulheres</p>
                                        <h2 class="mb-0 text-danger"><?php echo htmlspecialchars($row_m['total']) ?></h2>
                                    </div></a>
                                </div>
                            </div>
                        </div>  
                       </div>
</div>
                      
                        
                        
                    </div>
                </section>

        </div>
    </div>

 
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