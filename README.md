<h1>Painel Corporativo web com PHP e Javascript</h1>
<h2>Novidades adicionais!</h2>
<ul>
  <li>
    <p>Mais rapidez e velocidade na verificação do diretório das mídias digitais, além de oferecer a possibilidade de integrar vários diretórios em uma mesmo link</p>
  </li>
  <li>
    <p>A versão anterior se sobrecarregava na hora de verificar a lista de mídias, pois era feito em tempo de transição de uma mídia para outra.</p>
    <p>Agora a verificação da lista é feita durante a execução das mídias, ou seja enquanto o navegador executa a imagem ou o video em backend ele já faz um pré carregamentos da lista de mídias, ganhando muito mais velocidade nas transições de mídia o que possibilitou agregar vários diretórios ao mesmo tempo.</p>
  </li>
</ul>
<h2>Finalidade</h2>
<ul>
  <li>
    <p>Com este projeto simples mais eficiente, você pode configurar e separar vídeos e imagens com mensagens de avisos para o ambiente corporativo!</p>
    <p>Toda configuração de exibição pode ser separada por pastas para determinados setores e links diferentes para exibição em setores da empresa com necessidades de informações distintas. </p>
  </li>
</ul>

<h2>Necessidades da aplicação</h2>
<ul>
  <li>
    <p>Servidor PHP8 ou superior ligado e configurado a rede interna</p>
  </li>
  <li>
    <p>Compartilhamento SAMBA se for servidor Linux, para facilitar o acesso ao conteúdo exibido além de poder especificar usuários que poderão manipular as mídias que serão exibidas.</p>
  </li>
  <li>
    <p>Monitor ou aparelho TV para exibição das mídias</p>
  </li>
  <li>
    <p>Microcomputador ou próprio aparelho TV que execute a URL em sincronia na mesma rede, porem é recomendado que o navegador possa se manter em tela cheia durante a transição do conteúdo.</p>
  </li>
</ul>

<h2>Instalação e configuração</h2>
<ul>
  <li>
    <p>Depois de baixar e colocar o projeto no diretório do seu servidor PHP8, Crie as pastas que você necessita separadas por setores dentro do seu servidor, Lembrando que você tem que lavar em consideração o diretório do projeto.</p>
    <p>por exemplo se a pasta raiz web do seu servidor for (/var/www/html)<p/>
    <p>e o diretório que ira receber os vídeos e fotografias for (/home/usuarios/fotos/adiministrativo)<p/>
    <p>você tera que configurar na URL o retorno na raiz exemplo:<p/>
    <p>http://ip_servidor/painelcorporativo/?dir=../../../home/usuarios/fotos/adiministrativo<p/>
  </li>
  <li>
    <p>Depois de configurado cerifique as permissões de execução e visualização para a pasta.</p>
  </li>
  <li>
    <p>Para facilitar o acesso as pastas via rede no mesmo devidor PHP8 é recomendado instalar o SAMBA com protocolo de compartilhamento, isso permite acessar as pastas e conteúdo de exibição de maneira mais segura e eficiente via rede de qualquer aparelho conectado.</p>
  </li>
  <li>
    <p>Nossos testes executados foram feitos a partir de um aparelho microcomputador Linux mint ligado a uma TV.</p>
    <p>Foi configurado no sistema operacional no medo de inicio do sistema para executar o navegador Firefox que já estava projetado para abrir a URL como pagina de inicio e com um plugin para tela cheia automática, além do próprio microcomputador já configurado, caso tenha queda de energia, para reiniciar automaticamente.</p>
  </li>
  <li>
    <p>Foi utilizado um link de marcação com diretório diferente para cada aparelho em cada setor do ambiente de teste.</p>
  </li>
</ul>

<h2>Parâmetros URL suportados</h2>
<ul>
  <li>
    <p>Para configurar os links apontando para listar o conteúdo de determinada pasta e configurar o tempo das fotografias veja os Parâmetros URL suportados:</p>
  </li>
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

<h2>Exemplos url por setores</h2>
<ul>
  <li>
    <p>url para administrativo</p>
    <h3>http://'.$url.'/?tempo=15&foto=.mp4,.mkv&foto=.jpg&dir=diretorio/setor/administrativo</h3>
  </li>
  <li>
    <p>url para área de desenvolvimento</p>
    <h3>http://'.$url.'/?tempo=30&foto=.mp4&foto=.jpg,.png&dir=diretorio/setor/desenvolvimento</h3>
  </li>
  <li>
    <p>url para listar os 2 diretórios</p>
    <h3>http://'.$url.'/?tempo=30&foto=.mp4&foto=.jpg,.png&dir=diretorio/setor/desenvolvimento,diretorio/setor/administrativo</h3>
  </li>
</ul>
