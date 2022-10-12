<h1>Yappa Logs - The Quickest Analyser</h1>  
<?php
$OK = Verificacao($_FILES);
//gera um nome tratado para os padrões web
$sArquivo = 'logs/'.$_FILES['userfile']['name'];

//Se os dados enviados foram aprovados pela verificação
if ($OK == '') {
  //move o arquivo salvo para a pasta de destino, já com o novo nome
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $sArquivo)) {
    echo '<p>Arquivo ' . $sArquivo . ' carregado com sucesso!<br><br>';
 // echo '<p><img src="' . $sArquivo . '" /></p>';
  } else {
    print "Possível ataque de upload! Aqui esta alguma informação:\n";
    print_r($_FILES);
  }
} else {
  echo '<p><strong>Erro ao salvar arquivo</strong></p>';
  echo "<p>Detalhes do erro: $OK</p>";
}

//Verifica o tamanho e a extensão do arquivo
function Verificacao($aDados) { //Verificação de segurança
  $aExtensoesPermitidas = Array('log'); //Extensões permitidas
//  $iMaxTamanhoArquivo = 300000; //Tamanho máximo do arquivo permitido
  $sRet = '';

  if (in_array(pathinfo($aDados['userfile']['name'],
      PATHINFO_EXTENSION), $aExtensoesPermitidas)) {
    //if ($aDados['userfile']['size'] > $iMaxTamanhoArquivo) {
    //  $sRet = "Tamanho do arquivo excede o máximo permitido.";
    //}
  } else {
    $sRet = "Tipo de arquivo não permitido.";
  }
  return $sRet;
}

// pega dados do log e coloca na tela
$content = file_get_contents($sArquivo);
$content_array = explode("\n", $content);
foreach($content_array as $content_item) {
    echo $content_item.'<br/>';
}

?>