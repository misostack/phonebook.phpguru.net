<?php

namespace PhpGuru\CheatSheet;

class CheatSheetRow
{
	private string $command;
	private string $params;
	private string $description;
	private readonly CheatSheet $cheatSheet;
	private CheatSheetGroup $cheatSheetGroup;

	private $attributes = [];

	// magic methods

	public function __set(
		string $name,
		$value
	): void {
		$this->attributes[$name] = $value;
	}

	public function __get(string $name)
	{
		if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}
		return "";
	}

	public function __toString(): string
	{
		return "{$this->command} {$this->params} {$this->description} - {$this->cheatSheetGroup->getName()}";
	}

	public function __clone(): void
	{
		// Implement deepclone
		$this->cheatSheetGroup = clone $this->cheatSheetGroup;
	}

	/**
	 * @param  string  $command
	 * @param  string  $params
	 * @param  string  $description
	 * @param  CheatSheetGroup  $cheatSheetGroup
	 */
	public function __construct(
		string $command,
		string $params,
		string $description,
		CheatSheetGroup $cheatSheetGroup
	) {
		$this->command = $command;
		$this->params = $params;
		$this->description = $description;
		$this->cheatSheetGroup = $cheatSheetGroup;
		$this->cheatSheet = $cheatSheetGroup->getCheatSheet();
	}

	/**
	 * @return string
	 */
	public function getCommand(): string
	{
		return $this->command;
	}

	/**
	 * @param  string  $command
	 */
	public function setCommand(string $command): void
	{
		$this->command = $command;
	}

	/**
	 * @return string
	 */
	public function getParams(): string
	{
		return $this->params;
	}

	/**
	 * @param  string  $params
	 */
	public function setParams(string $params): void
	{
		$this->params = $params;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param  string  $description
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	/**
	 * @return CheatSheet
	 */
	public function getCheatSheet(): CheatSheet
	{
		return $this->cheatSheet;
	}

	/**
	 * @return CheatSheetGroup
	 */
	public function getCheatSheetGroup(): CheatSheetGroup
	{
		return $this->cheatSheetGroup;
	}

	/**
	 * @param  CheatSheetGroup  $cheatSheetGroup
	 */
	public function setCheatSheetGroup(CheatSheetGroup $cheatSheetGroup): void
	{
		$this->cheatSheetGroup = $cheatSheetGroup;
	}


}