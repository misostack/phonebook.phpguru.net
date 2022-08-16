<?php declare(strict_types=1);

final class StringManipulationTest extends \PHPUnit\Framework\TestCase
{
	public function testEmpty(): void
	{
		$inputStr = "";
		$outputStr = PhpGuru\StringManipulation::trimVietnameseAccent($inputStr);
		$this->assertEmpty($outputStr);
	}
}