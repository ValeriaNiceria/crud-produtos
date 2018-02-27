<?php

//Classe responsável por fazer leituras no banco de dados

class Ler extends Conecta {

	private $select;
	private $resultados;
	private $ler;
	private $conecta;

	public function query($tabela, $termos = NULL) {
		$this->select = ("SELECT * FROM {$tabela} {$termos}");

		$this->conecta = parent::conn();

		$this->ler = $this->conecta->prepare($this->select);

		$this->ler->setfetchMode(PDO::FETCH_ASSOC);

		try {

			$this->ler->execute();

			$this->resultados = $this->ler->fetchAll();

		} catch(PDOException $erro) {
			$this->resultados = NULL;
			die("Erro: " . $erro->getMessage());
		}

	}

	//Retorna os resultados em Array
	public function getResultados() {
		return $this->resultados;
	}

}