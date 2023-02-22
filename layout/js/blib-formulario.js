$(document).ready(function(){
  //----------------------------------------------
  var enviando=false;
  function carrega_lista(
    url_envio,
    form_data
  ){
    if(enviando){
      enviando.abort();
    }
    enviando=$.ajax({
      url: url_envio,
      type: 'POST',
      data: form_data,
      success: function(response) {
        console.log('ajax='+response);
      }//sucesso
    });//ajax
  }//function
  //------------------------------------------------
  carrega_lista(
    'paginas/backend/lista_midias.php'+
    $('body').attr('link'),
    'true=true'
  );
});//ready
