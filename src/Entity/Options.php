<?php


namespace Netliva\OptionsBundle\Entity;


class Options
{
	private $id;

	private $keyword;

	private $value;

	public function getId()
	{
		return $this->id;
	}

	public function getKeyword(): ?string
	{
		return $this->keyword;
	}

	public function setKeyword(string $keyword): self
	{
		$this->keyword = $keyword;

		return $this;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setValue($value): self
	{
		$this->value = $value;

		return $this;
	}
}
