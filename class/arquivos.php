<?php
class arquivos{
  public $lista=[];
  public $dir=['files/fotos','files/videos'];
  public $ext_video=[
    '.mp4'
  ];
  public $ext_foto=[
    '.png','.jpeg','.jpg'
  ];
  public $tempo=10;
  public $play=false;
  public $proximo=0;
  public $tot=-1;
  public $link;
  public $raiz='';
  //--------------------------------------------
  public function __construct($raiz=''){
    if($raiz!=''){
      $this->raiz=$raiz;
    }
    $this->recebe_parametros();
  }
  //--------------------------------------------
  public function carrega_lista(){
    $nome_dir=implode(',',$this->dir);

    foreach ($this->dir as $dir) {
      $this->lista_conteudo($dir,$nome_dir);
    }//for
    $_SESSION[$nome_dir]=$this->lista;
    $_SESSION['tot_'.$nome_dir]=$this->tot;
    return $this->lista;
  }//mt
  //--------------------------------------------
  public function trata_url($dir){
    if(substr($dir, -1)=='/'){
      return substr($dir, 0, -1);
    }else{
      return $dir;
    }
  }//mt
  //--------------------------------------------
  public function recebe_parametros(){

    if(isset($_GET['dir'])){
      if($_GET['dir']==''){
        $this->dir=['files/fotos','files/videos'];
      }else{

        if(strpos( $_GET['dir'], ',')){
          $this->dir=explode(',',$_GET['dir']);
        }else{
          $this->dir=[ $_GET['dir'] ];
        }

      }
    }


    if(is_numeric(@$_GET['tempo'])){
      $this->tempo=$_GET['tempo'];
    }


    if( strpos( @$_GET['video'], ',') ){
      $this->ext_video=explode(',',$_GET['video']);

    }else if( isset($_GET['video']) ){
        $this->ext_video=[$_GET['video']];
    }

    if( strpos( @$_GET['foto'], ',') ){
      $this->ext_foto=explode(',',$_GET['foto']);

    }else if( isset($_GET['foto']) ){
        $this->ext_foto=[$_GET['foto']];
    }

  }//mt
  //--------------------------------------------
  public function lista_conteudo($dir,$nome_dir){
    $dir=$this->trata_url($dir);
    //$this->lista=[];
    $lista=array_diff(scandir($this->raiz.$dir), array('.','..'));
    foreach ($lista as $l) {
      //$l=explode('');
      if(strpos( str_replace($this->ext_video, '</exe/>', $l), '</exe/>') ){
        $ext=explode('.',$l);
        $this->lista[]=['arquivo'=>$dir.'/'.$l,'ext'=>$ext[1],'tipo'=>'video'];
        $this->tot++;
      }else if(strpos( str_replace($this->ext_foto, '</exe/>', $l), '</exe/>') ){
        $ext=explode('.',$l);
        $this->lista[]=['arquivo'=>$dir.'/'.$l,'ext'=>$ext[1],'tipo'=>'foto'];
        $this->tot++;
      }
    }
    return $this->lista;
  }//mt
  //---------------------------------------------
  public function monta_mural(){
    $dir=implode(',',$this->dir);
    if( isset($_SESSION[$dir]) ){
      $lista=$_SESSION[$dir];
      $this->tot=$_SESSION['tot_'.$dir];
      //print_r($_SESSION);
    }else{
      $lista=$this->carrega_lista();
    }

    if($this->tot != -1){

      $mostra = $_GET['seq'] ?? 0;
      $this->proximo=$mostra+1;
      $this->play=$lista[$mostra];

      if($this->proximo>$this->tot){
        $this->proximo=0;
      }
      if( !file_exists($this->play['arquivo']) ){
        $this->play['tipo']=false;
        $this->proximo=0;
      }

      //$this->recebe_parametros();
      $this->link='?seq='.$this->proximo.
      '&tempo='.$this->tempo.
      '&video='.implode(',',$this->ext_video).
      '&foto='.implode(',',$this->ext_foto).
      '&dir='.$dir;

    }//if
  }//mt

}//class

?>
