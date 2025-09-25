<?php

require_once(__DIR__ . "/Geracao.php");

class Pokemon {

	private $id;
	private $nome;
	private $descricao;
	private $link;
	private $tipo1;
	private $tipo2;
	private $evolucao;
    private ?Geracao $geracao;

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
	 * Get the value of nome
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Set the value of nome
	 */
	public function setNome($nome): self
	{
		$this->nome = $nome;

		return $this;
	}

	/**
	 * Get the value of descricao
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Set the value of descricao
	 */
	public function setDescricao($descricao): self
	{
		$this->descricao = $descricao;

		return $this;
	}

	/**
	 * Get the value of link
	 */
	public function getLink()
	{
		return $this->link;
	}

	/**
	 * Set the value of link
	 */
	public function setLink($link): self
	{
		$this->link = $link;

		return $this;
	}

	/**
	 * Get the value of tipo1
	 */
	public function getTipo1()
	{
		return $this->tipo1;
	}

	/**
	 * Set the value of tipo1
	 */
	public function setTipo1($tipo1): self
	{
		$this->tipo1 = $tipo1;

		return $this;
	}

	/**
	 * Get the value of tipo2
	 */
	public function getTipo2()
	{
		return $this->tipo2;
	}

	/**
	 * Set the value of tipo2
	 */
	public function setTipo2($tipo2): self
	{
		$this->tipo2 = $tipo2;

		return $this;
	}

	/**
	 * Get the value of evolucao
	 */
	public function getEvolucao()
	{
		return $this->evolucao;
	}

	/**
	 * Set the value of evolucao
	 */
	public function setEvolucao($evolucao): self
	{
		$this->evolucao = $evolucao;

		return $this;
	}

    /**
     * Get the value of geracao
     */
    public function getGeracao(): ?Geracao
    {
        return $this->geracao;
    }

    /**
     * Set the value of geracao
     */
    public function setGeracao(?Geracao $geracao): self
    {
        $this->geracao = $geracao;

        return $this;
    }
}
?>