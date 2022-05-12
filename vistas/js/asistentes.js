/*=============================================
ELIMINAR ASISTENCIA PILOTO
=============================================*/
$(document).on("click", ".btnEliminarAsistencia", function(){

//$(".tablas").on("click", ".btnEliminarUsuario", function(){

  var idAsistencia = $(this).attr("idAsistencia");

  console.log('id asistencia: '+idAsistencia);

  swal({
    title: '¿Está seguro de borrar la asistencia del piloto?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar asistencia!'
  }).then(function(result){

    if(result.value){

    	//redireccionamos la pagina con una variable get enviando el id del usuario y la ruta de la foto
      window.location = "index.php?ruta=asistentes&idAsistencia="+idAsistencia

    }

  })

})
