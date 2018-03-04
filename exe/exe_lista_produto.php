<?php
$tabela = "produtos";

$Ler = new Ler;
$Ler->query($tabela);

$produtos = $Ler->getResultados();