<?php
function validar_nome(string $nome): array {
 $erros = [];
 if (empty(trim($nome))) {
 $erros[] = "O campo Nome é obrigatório.";
 } elseif (preg_match('/\d/', $nome)) {
 $erros[] = "O campo Nome não pode conter números.";
 }
 return $erros;
}