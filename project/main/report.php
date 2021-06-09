<?php
include "../theme/layout/header.php";
include "../theme/layout/sidebar.php";

require ('../function/db/config.php');

    $nome = $_SESSION['nome'];
    $sql_total = "select count(*) total
    from
    pacientes where estado not in ('Obito', 'Alta', 'Transferido')
    and deleted_record <> 'SIM'";
    $stmt_total = $pdo->query($sql_total); 
    $row_total = $stmt_total->fetch(PDO::FETCH_ASSOC);

    $sql_grave = "select count(*) total
    from
    pacientes
    where estado = 'Grave'  and deleted_record <> 'SIM'";
    $stmt_grave = $pdo->query($sql_grave); 
    $row_grave = $stmt_grave->fetch(PDO::FETCH_ASSOC);

    $sql_critico = "select count(*) total
    from
    pacientes
    where estado = 'Critico'
    and deleted_record <> 'SIM'
    ";
    $stmt_critico = $pdo->query($sql_critico); 
    $row_critico = $stmt_critico->fetch(PDO::FETCH_ASSOC);

    $sql_moderado = "select count(*) total
    from
    pacientes
    where estado = 'Moderado'
     and deleted_record <> 'SIM'";
    $stmt_moderado = $pdo->query($sql_moderado); 
    $row_moderado = $stmt_moderado->fetch(PDO::FETCH_ASSOC);


    $sql_alta = "select count(*) total
    from
    pacientes
    where estado = 'Alta'
     and deleted_record <> 'SIM'
     and update_status > (NOW() - INTERVAL 24 HOUR)";
    $stmt_alta = $pdo->query($sql_alta); 
    $row_alta = $stmt_alta->fetch(PDO::FETCH_ASSOC);


    $sql_obito = "select count(*) total
    from
    pacientes
    where estado = 'Obito'
    and deleted_record <> 'SIM' and
    update_status > (NOW() - INTERVAL 24 HOUR)";
    $stmt_obito = $pdo->query($sql_obito); 
    $row_obito = $stmt_obito->fetch(PDO::FETCH_ASSOC);

    $sql_transfer = "select count(*) total
    from
    pacientes
    where estado = 'Transferido'
    and deleted_record <> 'SIM' and
    update_status > (NOW() - INTERVAL 24 HOUR)";
    $stmt_transfer = $pdo->query($sql_transfer); 
    $row_transfer = $stmt_transfer->fetch(PDO::FETCH_ASSOC);

    $sql_entradas = "select count(*) total
    from
    pacientes
    where estado not in ('Obito', 'Alta', 'Transferido')
    and deleted_record <> 'SIM' and
    data_internamento > (NOW() - INTERVAL 24 HOUR)";
    $stmt_entradas = $pdo->query($sql_entradas); 
    $row_entradas = $stmt_entradas->fetch(PDO::FETCH_ASSOC);

    
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
                <div class="card">
                   <ul class="navbar-nav ml-auto">
<li class="nav-item active">
<a href="https://api.whatsapp.com/send?text=

<?php

$actual_date = date("d-m-Y");

$yesterday=date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));
try {

  $sql_d = "
  select *
  from
  pacientes
  where estado not in ('Alta', 'Obito', 'Transferido')
  and deleted_record <> 'SIM'
  order by estado asc
  ";


$sql_e = "
  select *
  from
  pacientes
  where estado not in ('Alta', 'Obito', 'Transferido')
  and deleted_record <> 'SIM'
  and data_internamento> (NOW() - INTERVAL 24 HOUR)
  order by estado asc
  ";

  $sql_a = "
  select *
  from
  pacientes where estado = 'Alta'
  and deleted_record <> 'SIM' and
  update_status > (NOW() - INTERVAL 24 HOUR)
  ";

  $sql_o = "
  select *
  from
  pacientes where estado = 'Obito'
  and deleted_record <> 'SIM'
  and update_status > (NOW() - INTERVAL 24 HOUR)
  ";

 $sql_t = "
  select *
  from
  pacientes where estado = 'Transferido'
  and deleted_record <> 'SIM' and update_status > (NOW() - INTERVAL 24 HOUR)
  ";


 $sql_v = "
  select ventilacao, count(*) total
from pacientes
where deleted_record <> 'SIM' 
and estado not in ('Alta', 'Obito', 'Transferido')
GROUP BY ventilacao";
 
    $d = $pdo->query($sql_d);
    $a = $pdo->query($sql_a);
    $o = $pdo->query($sql_o);
    $t = $pdo->query($sql_t);
    $v = $pdo->query($sql_v);
    $e = $pdo->query($sql_e);
    $d->setFetchMode(PDO::FETCH_ASSOC);
    $a->setFetchMode(PDO::FETCH_ASSOC);
    $o->setFetchMode(PDO::FETCH_ASSOC);
    $t->setFetchMode(PDO::FETCH_ASSOC);
    $v->setFetchMode(PDO::FETCH_ASSOC);
    $e->setFetchMode(PDO::FETCH_ASSOC);


    $i=0;
    echo "*Relatório gerado por PGC*%0a%0a"; 
    echo "Enviado por *" . $nome . "* do turno : *" . $yesterday . "* à  *". $actual_date ."*%0a%0a"; 

    echo "Total de Pacientes: *" . $row_total['total'] . "*%0a";
    echo "Graves: *" . $row_grave['total'] . "*%0a";
    echo "Criticos: *" . $row_critico['total'] . "*%0a"; 
    echo "Moderados: *" . $row_moderado['total'] . "*%0a";

echo "-------------------------------------------------";

echo "%0a";

    echo "*Movimentos*%0a%0a";

    echo "Entradas: *" . $row_entradas['total'] . "*%0a";
    

    
echo "(";
//Pacientes com altas nas ultimas 24h
  while ($row_e = $e->fetch()){

      echo "" . $row_e['nome'] . "-";              
}
 echo ")";

 echo "%0a%0a";

    echo "Altas: *" . $row_alta['total'] . "*%0a";
    

    
echo "(";
//Pacientes com altas nas ultimas 24h
  while ($row_a = $a->fetch()){

      echo "" . $row_a['nome'] . "-";              
}
 echo ")";



echo "%0a%0a";

echo "Obitos: *" . $row_obito['total'] . "*%0a";

echo "(";
//Pacientes com altas nas ultimas 24h
  while ($row_o = $o->fetch()){

      echo "" . $row_o['nome'] . "-";              
}
 echo ")";


echo "%0a%0a";


echo "Transferidos: *" . $row_transfer['total'] . "*%0a";

echo "(";
//Pacientes com altas nas ultimas 24h
  while ($row_t = $t->fetch()){

      echo "" . $row_t['nome'] . "-";              
}
 echo ")";



echo "%0a";
echo "-------------------------------------------------";
echo "%0a";

echo "*Ventilacao*%0a";

while ($row_v = $v->fetch()){

      echo "" . $row_v['ventilacao'] . "-". $row_v['total'] . "%0a";              
}

echo "-------------------------------------------------";
echo "%0a";

echo "*Internados*%0a%0a";

    while ($row_d = $d->fetch()){

                           
                             echo  "*".++$i."-".$row_d['nome']."/".$row_d['idade']."/".$row_d['genero']."/".$row_d['etnia']."*%0a";
                             echo  "Profissao: ".$row_d['profissao']."%0a";
                             echo  "Diagnostico: ".$row_d['diagnostico']."%0a";
                             echo  "Proveniencia: ".$row_d['proveniencia']."%0a";
                             echo  "Comorbidade: ".$row_d['comorbidade']."%0a";
                             echo  "Estado Geral: ".$row_d['estado']."%0a";

                             echo  "*******************************************************%0a%0a";
   
}
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>                       




" class="btn btn-success glow mr-1 mb-1"><i class="bx 
bxl-whatsapp"></i><span class="align-middle ml-25">Partilhar</span></a></li>
</ul>
                                                <div class="card-content">

                                                    <div class="card-body">

 <!-- timeline widget start -->
                                                        <ul class="widget-timeline">
                                                           
          
                          <?php
require ('../function/db/config.php');
try {

  $sql = "
  select *
  from
  pacientes
  where estado not in ('Obito', 'Alta')
  order by estado asc

  ";
 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $q->fetch()){

                            if($row['estado']=="Moderado"){

                                                       echo '
                                   <li class="timeline-items timeline-icon-primary active">';
                                                        }
                                    if($row['estado']=="Grave"){

                                                       echo '
                                    <li class="timeline-items timeline-icon-warning active">';
                                                        }
                                    if($row['estado']=="Critico"){

                                                       echo '
                                    <li class="timeline-items timeline-icon-danger active">';
                                                        }


                             echo "   
                                    <h6 class='timeline-title'>".$row['nome']."/".$row['idade']."/".$row['genero']."/".$row['etnia']."</h6>";

                                    if($row['estado']=="Moderado"){

                                                       echo '
                                    <p class="timeline-text">Estado: <span class="text-primary">Moderado</span></p>';
                                                        }
                                    if($row['estado']=="Grave"){

                                                       echo '
                                    <p class="timeline-text">Estado: <span class="text-warning">Grave</span></p>';
                                                        }
                                    if($row['estado']=="Critico"){

                                                       echo '
                                    <p class="timeline-text">Estado: <span class="text-danger">Critico</span></p>';


                                       
                                                        }
                                                         echo "</li>";

                                                       echo '

                                    <div class="timeline-content">
                                    <span class="text-dark">Profissão:</span>'.$row['profissao'].' 
                                    </div>';

                                                     echo '

                                    <div class="timeline-content">
                                    <span class="text-dark">Diagnostico:</span>'.$row['diagnostico'].' 
                                    </div>';

                                                     echo '

                                    <div class="timeline-content">
                                    <span class="text-dark">Coorbidade:</span>'.$row['comorbidade'].' 
                                    </div>';



                                    
                                                        

     
}
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>                                      
                                                               

                                                            
                                                           
                                                           
                                                            <li class="timeline-items timeline-icon-info active">
                                                                <div class="timeline-time"></div>
                                                                <h6 class="timeline-title"></h6>
                                                                <p class="timeline-text">
                                                                  <a href="
                                                            <li class="timeline-items timeline-icon-warning">
                                                                <div class="timeline-time"></div>
                                                                <h6 class="timeline-title"> </h6>
                                                                <p class="timeline-text"> <a href="JavaScript:void(0);"></a></p>
                                                                <div class="timeline-content">
                                                                    
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <!-- timeline widget ends -->
                                                       
                                                    </div>
                                                </div>
                                            </div>
                <!-- Dashboard Analytics end -->

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