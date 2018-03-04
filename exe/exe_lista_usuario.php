<?php

$tabela = "usuarios";

$Ler = new Ler;

$Ler->query($tabela);

$usuarios = $Ler->getResultados();