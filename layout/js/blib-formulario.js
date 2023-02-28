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
  }//fun
  //------------------------------------------------

  var url_link=$('body').attr('link');

  function transicao(tempo=10000){
    setTimeout(function() {
      window.location.href = url_link;
    }, tempo);
  }//fun
  //------------------------------------------------

  function tempo_video(){
    $("#myVideo").attr('style','');
    var vid = document.getElementById("myVideo");
    var exibe=false;
    vid.ontimeupdate = function() {
      if(exibe==false){

        exibe=vid.duration;
        exibe=exibe*970;

        transicao(exibe);


      }//if
    }
  }//func
  //------------------------------------------------

  function tempo_foto(){
    var arquivo=$('body').attr('arquivo');
    var tempo=$('body').attr('tempo');
    $(".p_painel_play_foto").attr('style','background-image:url('+arquivo+');');
    tempo = tempo*1000;
    transicao(tempo);
  }//func
  //------------------------------------------------
  function tempo_off(){
    $(".p_painel_play_none").attr('style','');
    transicao();
  }//func
  //------------------------------------------------
  function executa_play(){
    var tipo=$('body').attr('tipo');
    if(tipo=='foto'){
      tempo_foto();
    }else if (tipo=='video') {
      tempo_video();
    }else{
      tempo_off();
    }

  }//fun
  //------------------------------------------------
  executa_play();
  carrega_lista(
    'paginas/backend/lista_midias.php'+
    $('body').attr('link'),
    'true=true'
  );
});//ready
