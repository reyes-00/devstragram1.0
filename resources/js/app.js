import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

let dropzone = new Dropzone("#dropzone",{
  init: function(){
    
  },

  dictDefaultMessage: "Selecciona una Imagen para subir",
  acceptedFiles: ".png, .jpg, .jpeg, .gif",
  paramName: 'imagen',
  addRemoveLinks: true,
  dictRemoveFile: "Borrar Archivo",
  maxFiles:1,
  uploadMultiple: false,

});


dropzone.on('success', function(file, response){
  const {nombre_final} = response;
  const imagen = document.querySelector("#imagen");
  imagen.value = nombre_final

  console.log(imagen);
})

dropzone.on('removedfile', function(){
  document.querySelector("#imagen").value = "";
})