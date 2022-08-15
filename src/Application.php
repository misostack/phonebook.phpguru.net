<?php

namespace PhpGuru;

use PhpGuru\CheatSheet;
use PhpGuru\CheatSheet\CheatSheetRow;


function deepCloneCheatSheetRow($object): CheatSheetRow
{
	return unserialize(serialize($object));
}

class Application
{
	public function start(): void
	{
		$redisCheatSheet = new CheatSheet\CheatSheet("Redis", "redis.png");
		$cheatSheetGroup = new CheatSheet\CheatSheetGroup("Strings", "#0000ff", $redisCheatSheet);
		$cheatSheetRow = new CheatSheet\CheatSheetRow("APPEND", "key value", "Append", $cheatSheetGroup);
		printf("%s<br/>", $redisCheatSheet->getName());
		printf("%s<br/>", $cheatSheetGroup->getName());
		printf("%s<br/>", $cheatSheetRow);
		// clone
		$newSheetRow = clone $cheatSheetRow;
		$newSheetRow->setCommand("run");
		$newSheetRow->getCheatSheetGroup()->setName("OHO");
		printf("%s<br/>", $newSheetRow);
		printf("%s<br/>", $cheatSheetRow);
		$currentTime = date("d-m-Y H:i:s");
		// using serialize
		$anotherSheetRow = deepCloneCheatSheetRow($cheatSheetRow);
		$anotherSheetRow->setCommand("tada");
		printf("%s<br/>", $anotherSheetRow);
		echo "Application start at ".$currentTime;
	}
}