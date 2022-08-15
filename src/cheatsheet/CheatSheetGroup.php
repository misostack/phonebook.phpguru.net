<?php

namespace PhpGuru\CheatSheet;

class CheatSheetGroup
{
	private string $name;
	private string $color;
	private CheatSheet $cheatSheet;

	/**
	 * @param  string  $name
	 * @param  string  $color
	 * @param  CheatSheet  $cheatSheet
	 */
	public function __construct(string $name, string $color, CheatSheet $cheatSheet)
	{
		$this->name = $name;
		$this->color = $color;
		$this->cheatSheet = $cheatSheet;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param  string  $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getColor(): string
	{
		return $this->color;
	}

	/**
	 * @param  string  $color
	 */
	public function setColor(string $color): void
	{
		$this->color = $color;
	}

	/**
	 * @return CheatSheet
	 */
	public function getCheatSheet(): CheatSheet
	{
		return $this->cheatSheet;
	}

	/**
	 * @param  CheatSheet  $cheatSheet
	 */
	public function setCheatSheet(CheatSheet $cheatSheet): void
	{
		$this->cheatSheet = $cheatSheet;
	}

}