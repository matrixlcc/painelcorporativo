<?php session_start();
require 'class/arquivos.php';
$arq=new arquivos();
$arq->monta_mural();

?>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">

  <meta name="google" value="notranslate">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <meta name="theme-color" content="#000">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" href="layout/css/template.css" rel="stylesheet" />


  <title>
    Paine Corporativo
  </title>
  <script type="text/javascript" src="layout/js/blib-jquery_1.5.js"></script>
  <script type="text/javascript" src="layout/js/blib-ajax.js"></script>
  <script type="text/javascript" src="layout/js/blib-formulario.js" ></script>


</head>

  <body link="<?=$arq->link?>">
<?php if($arq->play['tipo']=='video'){ ?>
  <video id="myVideo" class="p_painel_play_video" controls autoplay muted>
  <source src="<?=$arq->play['arquivo']?>" type="video/<?=$arq->play['ext']?>">
  <object>
    <embed autoplay="autoplay" src="<?=$arq->play['arquivo']?>" type="application/x-shockwave-flash"
    allowfullscreen="true" allowscriptaccess="always">
  </object>
  Formato não suportado
</video>

<script type="text/javascript">

var vid = document.getElementById("myVideo");
var exibe=false;
vid.ontimeupdate = function() {
  if(exibe==false){

    exibe=vid.duration;
    exibe=exibe*970;

    setTimeout(function() {
      window.location.href = "<?=$arq->link?>";
    }, exibe); // 1/5 minutos


  }//if
}

</script>
<?php }else if($arq->play['tipo']=='foto'){ ?>
<div class="p_painel_play_foto" style="background-image:url(<?=$arq->play['arquivo']?>);"></div>
<script type="text/javascript">

var exibe=<?=$arq->tempo?>*1000;
setTimeout(function() {
  window.location.href = "<?=$arq->link?>";
}, exibe); // 1/5 minutos
</script>

<?php }else{?>
  <h1>Não foi encontrado Arquivos!</h1>
  <h2>Parâmetros URL suportados: </h2>
  <ul>
    <li>
      <p>aponta o diretor da lista de vídeos!</p>
      <h3>dir=diretorio/arquivos</h3>
    </li>
    <li>
      <p>extensões de vídeo permitidas</p>
      <h3>video=.mp4,.mkv</h3>
    </li>
    <li>
      <p>extensões de fotos permitidas</p>
      <h3>foto=.jpg,.png,.jpeg</h3>
    </li>
    <li>
      <p>tempo em segundos para transição de fotografias</p>
      <h3>tempo=10</h3>
    </li>
  </ul>


<?php
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos( $url, '/')){
  $url=explode('/',$url);
  $tot=count($url)-1;
  unset($url[$tot]);
  $url=implode('/',$url);
}
echo '<h2>Exemplos url por setores</h2>
<ul>
  <li>
    <p>url para administrativo</p>
    <h3>http://'.$url.'/?tempo=15&foto=.mp4,.mkv&foto=.jpg&dir=diretorio/setor/administrativo</h3>
  </li>
  <li>
    <p>url para área de desenvolvimento</p>
    <h3>http://'.$url.'/?tempo=30&foto=.mp4&foto=.jpg,.png&dir=diretorio/setor/desenvolvimento</h3>
  </li>
</ul>
';


?>
<script type="text/javascript">
var exibe=<?=$arq->tempo?>*1000;
setTimeout(function() {
  window.location.href = "";
}, exibe); // 1/5 minutos
</script>

<?php }?>
</body>

</html>
