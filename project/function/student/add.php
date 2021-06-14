<?php

function addPaciente(){

if(isset($_POST["submit"])){

$user = $_SESSION['nome'];
$deleted_record = 'NAO';
$comparacao=date('Y-m-d');

require ('../function/db/config.php');

if($_POST['classname'] == "NA"){
echo '<div class="alert alert-danger" role="alert">
  Por favor seleccione a classe do aluno!
</div>';
}
else{

try{   
$query = "INSERT INTO student
SET 
sname=:sname,
semail=:semail,
sgender=:sgender,
scontact=:scontact,
saddress=:saddress,
sdob=:sdob,
classname=:classname
";

$stmt = $pdo->prepare($query);

$sname=htmlspecialchars(strip_tags($_POST['sname']));
$semail=htmlspecialchars(strip_tags($_POST['semail']));
$sgender=htmlspecialchars(strip_tags($_POST['sgender']));
$scontact=htmlspecialchars(strip_tags($_POST['scontact']));
$saddress=htmlspecialchars($_POST['saddress']);
$sdob=htmlspecialchars(strip_tags($_POST['sdob']));
$classname=htmlspecialchars(strip_tags($_POST['classname']));
$current_time=date('Y-m-d H:i:s');
$sdob = date('Y-m-d', strtotime($_POST['sdob']));
$quarto=$_POST['quarto'];



$stmt->bindParam(':sname', $sname);
$stmt->bindParam(':semail', $semail);
$stmt->bindParam(':sgender', $sgender);
$stmt->bindParam(':scontact', $scontact);
$stmt->bindParam(':saddress', $saddress);
$stmt->bindParam(':sdob', $sdob);
$stmt->bindParam(':classname', $classname);



if ($stmt->execute()) {
echo '<div class="alert alert-success" role="alert">
  Paciente adicionado com sucesso.
</div>';

echo "<script type= 'text/javascript'>setTimeout(function () {    
    window.location.href = 'student_list.php'; 
},2000);</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Erro nao inserção! Contacte o Administrador.');</script>";
}

$pdo = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
}

}

?>