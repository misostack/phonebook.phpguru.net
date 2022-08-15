<?php

namespace PhpGuru\CheatSheet;

class CheatSheet
{
	private string $name;
	private string $icon;


	public function __construct(string $name, string $icon)
	{
		$this->name = $name;
		$this->icon = $icon;
	}

	/**
	 * @return mixed
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param  mixed  $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getIcon(): string
	{
		return $this->icon;
	}

	/**
	 * @param  mixed  $icon
	 */
	public function setIcon(string $icon): void
	{
		$this->icon = $icon;
	}
}