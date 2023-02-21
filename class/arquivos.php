<?php
class arquivos{
  public $dir='files';
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
  //--------------------------------------------
  public function __construct(){
    $this->recebe_parametros();
  }
  //--------------------------------------------
  public function recebe_parametros(){

    if(isset($_GET['dir'])){
      if($_GET['dir']==''){
        $this->dir='files';
      }else{
        //$this->dir=$_GET['dir'];
        if(substr($_GET['dir'], -1)=='/'){
          $this->dir=substr($_GET['dir'], 0, -1);
        }else{
          $this->dir=$_GET['dir'];
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
  public function lista_conteudo($dir){
    if($dir==false){
      $dir=$this->dir;
    }
    $r=[];
    $lista=array_diff(scandir($dir), array('.','..'));
    foreach ($lista as $l) {
      //$l=explode('');
      if(strpos( str_replace($this->ext_video, '</exe/>', $l), '</exe/>') ){
        $ext=explode('.',$l);
        $r[]=['arquivo'=>$dir.'/'.$l,'ext'=>$ext[1],'tipo'=>'video'];
        $this->tot++;
      }else if(strpos( str_replace($this->ext_foto, '</exe/>', $l), '</exe/>') ){
        $ext=explode('.',$l);
        $r[]=['arquivo'=>$dir.'/'.$l,'ext'=>$ext[1],'tipo'=>'foto'];
        $this->tot++;
      }
    }
    return $r;
  }//mt
  //---------------------------------------------
  public function monta_mural($dir=false){
    if($dir==false){
      $dir=$this->dir;
    }
    $lista=$this->lista_conteudo($dir);
    if($this->tot != -1){

      $mostra = $_GET['seq'] ?? 0;
      $this->proximo=$mostra+1;
      $this->play=$lista[$mostra];

      if($this->proximo>$this->tot){
        $this->proximo=0;
      }

      //$this->recebe_parametros();
      $this->link='?seq='.$this->proximo.
      '&tempo='.$this->tempo.
      '&video='.implode(',',$this->ext_video).
      '&foto='.implode(',',$this->ext_foto).
      '&dir='.$this->dir;

    }//if
  }//mt

}//class

?>
