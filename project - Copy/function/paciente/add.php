<?php

function addPaciente(){

if(isset($_POST["submit"])){

$user = $_SESSION['nome'];
$deleted_record = 'NAO';
$comparacao=date('Y-m-d');

require ('../function/db/config.php');

if($_POST['genero'] == "NA"){
echo '<div class="alert alert-danger" role="alert">
  Por favor seleccione o genero do paciente!
</div>';
}elseif($_POST['etnia'] == "NA"){
echo '<div class="alert alert-danger" role="alert">
  Por favor seleccione a etnia do paciente!
</div>';
}elseif($_POST['idade'] == "NA"){
echo '<div class="alert alert-danger" role="alert">
  Por favor seleccione a idade do paciente!
</div>';
}
elseif($_POST['proveniencia'] == "NA"){
echo '<div class="alert alert-danger" role="alert">
  Por favor seleccione a proveniencia do paciente!
</div>';
}
elseif($_POST['quarto'] == "NA"){
echo '<div class="alert alert-danger" role="alert">
  Por favor seleccione o quarto do paciente!
</div>';
}

elseif(!isset($_POST['estado'])){
echo '<div class="alert alert-danger" role="alert">
  Por favor seleccione o estado clinico do paciente!
</div>';

}
else{

try{   
$query = "INSERT INTO pacientes
SET 
nome=:nome,
genero=:genero,
idade=:idade,
profissao=:profissao,
etnia=:etnia,
contacto_familiar=:contacto_familiar,
grau_familiar=:grau_parentesco,
endereco=:endereco,
diagnostico=:diagnostico,
comorbidade=:comorbidade,
proveniencia=:proveniencia,
estado=:estado,
data_internamento=:data_internamento,
data_registo=:data_registo,
quarto=:quarto,
ventilacao=:ventilacao,
create_user=:create_user,
deleted_record=:deleted_record
";

$stmt = $pdo->prepare($query);

$nome=htmlspecialchars(strip_tags($_POST['nome']));
$genero=htmlspecialchars(strip_tags($_POST['genero']));
$idade=htmlspecialchars(strip_tags($_POST['idade']));
$profissao=htmlspecialchars(strip_tags($_POST['profissao']));
$etnia=htmlspecialchars($_POST['etnia']);
$contacto_familiar=htmlspecialchars(strip_tags($_POST['contacto_familiar']));
$grau_parentesco=htmlspecialchars(strip_tags($_POST['grau_parentesco']));
$endereco=htmlspecialchars(strip_tags($_POST['endereco']));
$diagnostico=htmlspecialchars(strip_tags($_POST['diagnostico']));
$comorbidade=htmlspecialchars(strip_tags($_POST['comorbidade']));
$proveniencia=htmlspecialchars(strip_tags($_POST['proveniencia']));
$estado=htmlspecialchars(strip_tags($_POST['estado']));
$ventilacao=htmlspecialchars(strip_tags($_POST['ventilacao']));
$current_time=date('Y-m-d H:i:s');
$data_internamento = date('Y-m-d', strtotime($_POST['data_internamento']));
$quarto=$_POST['quarto'];



$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':genero', $genero);
$stmt->bindParam(':idade', $idade);
$stmt->bindParam(':profissao', $profissao);
$stmt->bindParam(':etnia', $etnia);
$stmt->bindParam(':contacto_familiar', $contacto_familiar);
$stmt->bindParam(':grau_parentesco', $grau_parentesco);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':diagnostico', $diagnostico);
$stmt->bindParam(':comorbidade', $comorbidade);
$stmt->bindParam(':proveniencia', $proveniencia);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':data_internamento', $data_internamento);
$stmt->bindParam(':data_registo', $current_time);
$stmt->bindParam(':quarto', $quarto);
$stmt->bindParam(':ventilacao', $ventilacao);
$stmt->bindParam(':create_user', $user);
$stmt->bindParam(':deleted_record', $deleted_record);


if ($stmt->execute()) {
echo '<div class="alert alert-success" role="alert">
  Paciente adicionado com sucesso.
</div>';

echo "<script type= 'text/javascript'>setTimeout(function () {    
    window.location.href = 'paciente_list.php'; 
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