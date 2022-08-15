<?php

namespace PhpGuru;

use PhpGuru\Blog\File;
use PhpGuru\Blog\Image;
use PhpGuru\CheatSheet;
use PhpGuru\CheatSheet\CheatSheetRow;

define('UPLOAD_DIRECTORY', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'uploads');
define('SITE_URI', 'http://'.$_SERVER['HTTP_HOST']);

function deepCloneCheatSheetRow($object): CheatSheetRow
{
	return unserialize(serialize($object));
}

class Comparator
{
	private $key;

	public function __construct(string $key)
	{
		$this->key = $key;
	}

	public function __invoke($a, $b)
	{
		return $a[$this->key] <=> $b[$this->key];
	}
}

class Application
{
	public function __construct()
	{
		// create upload directory if not existed
		$this->createUploadDirectory();
	}

	private function createUploadDirectory()
	{
		if (!file_exists(UPLOAD_DIRECTORY)) {
			mkdir(UPLOAD_DIRECTORY, 644, true);
		}
	}

	public function saveUploadFile($file)
	{
		$target = UPLOAD_DIRECTORY;
		$targetFile = $target.DIRECTORY_SEPARATOR.basename($file['name']);
		$fileUrl = SITE_URI.'/uploads/'.basename($file['name']);
		$tmpFile = $file['tmp_name'];
		if (copy($tmpFile, $targetFile)) {
			$isImage = getimagesize($targetFile);
			if ($isImage) {
				return new Image($file['name'], $fileUrl, $targetFile, $isImage['mime']);
			}
			return new File($file['name'], $fileUrl, $targetFile, mime_content_type($targetFile));
		}
		return null;
	}

	public function transformFileArray($fileObject)
	{
		$files = [];
		$keys = array_keys($fileObject);
		$numberOfFiles = count($fileObject['name']);
		for ($i = 0; $i < $numberOfFiles; $i++) {
			$files[$i] = array();
			foreach ($keys as $key) {
				$files[$i][$key] = $fileObject[$key][$i];
			}
		}
		return $files;
	}

	public function uploadFilesHandle()
	{
		$storedFiles = [];
		$fileObject = $_FILES['files'] ?? null;
		if (!empty($fileObject)) {
			$rawFiles = $this->transformFileArray($fileObject);
			foreach ($rawFiles as $key => $file) {
				$storedFiles[] = $this->saveUploadFile($file);
			}
		}
		var_dump($storedFiles);
		return $storedFiles;
	}

	public function start(): void
	{
		$storedFiles = $this->uploadFilesHandle();
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
		// sort customers by names
		$customers = [
			['id' => 1, 'name' => 'John', 'credit' => 20000],
			['id' => 3, 'name' => 'Alice', 'credit' => 10000],
			['id' => 2, 'name' => 'Bob', 'credit' => 15000]
		];
		usort($customers, new Comparator('name'));
		print_r($customers);
		usort($customers, new Comparator('credit'));
		print_r($customers);


		echo "Application start at ".$currentTime;
		?>
        <!DOCTYPE html>
        <html>
        <body>
        <br/>
        <ul>
			<?php
			foreach ($storedFiles as $index => $storeFile) {
				echo "<li>{$index}. $storeFile</li>";
			}
			?>
        </ul>

        <form action="/" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" multiple="multiple" name="files[]" id="files">
            <input type="submit" value="Upload files" name="submit">
        </form>

        </body>
        </html>
		<?php
	}
}