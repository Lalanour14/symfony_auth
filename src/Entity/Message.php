<?php

namespace App\Entity;

class Message {
    public function __construct(
        private string $content,
        private int $idUser,
        private ?int $id = null
    ) {}
    

	/**
	 * @return 
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getContent(): string {
		return $this->content;
	}
	
	/**
	 * @param string $content 
	 * @return self
	 */
	public function setContent(string $content): self {
		$this->content = $content;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getIdUser(): int {
		return $this->idUser;
	}
	
	/**
	 * @param int $idUser 
	 * @return self
	 */
	public function setIdUser(int $idUser): self {
		$this->idUser = $idUser;
		return $this;
	}
}