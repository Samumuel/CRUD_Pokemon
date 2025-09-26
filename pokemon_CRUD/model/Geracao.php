<?php

class Geracao {

	private $id;
	private $numero;
	private $ano;
	private $jogo;
    private $jogo2;
	private $anime;
	private $cidade;
    

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 */
	public function setId($id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of numero
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * Set the value of numero
	 */
	public function setNumero($numero): self
	{
		$this->numero = $numero;

		return $this;
	}

	/**
	 * Get the value of ano
	 */
	public function getAno()
	{
		return $this->ano;
	}

	/**
	 * Set the value of ano
	 */
	public function setAno($ano): self
	{
		$this->ano = $ano;

		return $this;
	}

	/**
	 * Get the value of jogo
	 */
	public function getJogo()
	{
		return $this->jogo;
	}

	/**
	 * Set the value of jogo
	 */
	public function setJogo($jogo): self
	{
		$this->jogo = $jogo;

		return $this;
	}
    
    /**
	 * Get the value of jogo2
	 */
	public function getJogo2()
	{
		return $this->jogo2;
	}

	/**
	 * Set the value of jogo2
	 */
	public function setJogo2($jogo2): self
	{
		$this->jogo2 = $jogo2;

		return $this;
	}

	/**
	 * Get the value of anime
	 */
	public function getAnime()
	{
		return $this->anime;
	}

	/**
	 * Set the value of anime
	 */
	public function setAnime($anime): self
	{
		$this->anime = $anime;

		return $this;
	}

	/**
	 * Get the value of cidade
	 */
	public function getCidade()
	{
		return $this->cidade;
	}

	/**
	 * Set the value of cidade
	 */
	public function setCidade($cidade): self
	{
		$this->cidade = $cidade;

		return $this;
	}


}