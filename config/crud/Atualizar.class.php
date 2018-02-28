<?php

class Atualizar extends Conecta {

	private $update;
	private $atualizar;
	private $resultados;
	private $conecta;


	public function query($tabela, $dados, $termos) {
		$this->update = ("UPDATE {$tabela} SET {$dados} {$termos}");

		$this->conecta = parent::conn();

		$this->atualizar = $this->conecta->prepare($this->update);

		try {

			$this->atualizar->execute();
			$this->resultados = $this->atualizar->rowCount();

		} catch(PDOException $erro) {
			$this->resultados = NULL;
			echo ("Erro: " . $erro->getMessage());
		}
	}


	public function getResultados() {
		return $this->resultados;
	}
}
