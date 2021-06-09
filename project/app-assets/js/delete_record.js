$(document).ready(function(){
$('.delete_paciente').click(function(e){
e.preventDefault();
var empid = $(this).attr('data-emp-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Tem certeza que deseja eliminar este paciente?",
title: "<i class='glyphicon glyphicon-trash'></i> Apagar !",
buttons: {
success: {
label: "Não",
className: "btn-success",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
label: "Apagar!",
className: "btn-danger",
callback: function() {
$.ajax({
type: 'POST',
url: 'paciente_delete.php',
data: 'empid='+empid
})
.done(function(response){
bootbox.alert(response);
parent.fadeOut('slow');
})
.fail(function(){
bootbox.alert('Error....');
})
}
}
}
});
});
});