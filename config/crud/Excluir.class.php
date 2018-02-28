<?php

class Excluir extends Conecta {

	private $delete;
	private $excluir;
	private $resultados;
	private $conecta;

	public function query($tabela, $termos){
		$this->delete = ("DELETE FROM {$tabela} {$termos}");

		$this->conecta = parent::conn();

		$this->excluir = $this->conecta->prepare($this->delete);

		try {

			$this->excluir->execute();

			$this->resultados = $this->excluir->rowCount();

		} catch(PDOException $erro) {
			$this->resultados = NULL;
			die("Erro: " . $erro->getMessage());
		}
	}


	public function getResultados() {
		return $this->resultados;
	}
}