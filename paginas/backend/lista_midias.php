<?php
if(isset($_POST['true'])){
  session_start();
  require '../../class/arquivos.php';
  $arq=new arquivos('../../');
  $arq->carrega_lista();
  $_SESSION['backend']='true';
  print_r($_SESSION);
}else{
  echo'Erro!';
}
?>
