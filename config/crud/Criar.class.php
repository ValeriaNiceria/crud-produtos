<?php

class Criar extends Conecta {

	private $insert;
	private $criar;
	private $resultados;
	private $conecta;


	public function query($tabela, $colunas, $valores) {
		$this->insert = ("INSERT INTO {$tabela} ({$colunas}) VALUES ({$valores})");

		$this->conecta = parent::conn();

		$this->criar = $this->conecta->prepare($this->insert);

		try {

			$this->criar->execute();

			$this->resultados = $this->conecta->lastInsertId();

		} catch(PDOException $erro) {
			$this->resultados = NULL;
			die("Erro: " . $erro->getMessage());
		}
	}


	public function getResultados() {
		return $this->resultados;
	}
}