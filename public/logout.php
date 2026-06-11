<?php
// Inicia a sessão para aceder e manipular os dados da $_SESSION
session_start();
// --------------------------------------------------------------------
// TERMINAR A SESSÃO
// --------------------------------------------------------------------
// Remove todas as variáveis da sessão
// Isto limpa os dados armazenados, como $_SESSION['utilizador'], etc.
session_unset();
// Destroi completamente a sessão no servidor
// Isto elimina o identificador da sessão e os dados associados
session_destroy();
// --------------------------------------------------------------------
// REDIRECIONAMENTO PARA O LOGIN
// --------------------------------------------------------------------
// Após terminar a sessão, redireciona o utilizador para a página de login
header('Location: login.php');
// Encerra a execução do script
return;
