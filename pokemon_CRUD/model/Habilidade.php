<?php 

class Habilidade {

    private $id;
    private $tipo;
    private $vantagem;
    private $desvantagem;

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
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }
    /**
     * Set the value of tipoa
     */
    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    /**
     * Get the value of vantagem
     */
    public function getVantagem()
    {
        return $this->vantagem;
    }

    /**
     * Set the value of vantagem
     */
    public function setVantagem($vantagem): self
    {
        $this->vantagem = $vantagem;

        return $this;
    }

    /**
     * Get the value of desvantagem
     */
    public function getDesvantagem()
    {
        return $this->desvantagem;
    }

    /**
     * Set the value of desvantagem
     */
    public function setDesvantagem($desvantagem): self
    {
        $this->desvantagem = $desvantagem;

        return $this;
    }

}   