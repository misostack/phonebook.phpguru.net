<?php

namespace PhpGuru\Blog;

class File extends Attachment
{
	public function __construct(string $title, string $url, string $path, string $mime = '')
	{
		parent::__construct($title, $url, $path, $mime);
		$this->attachmentType = AttachmentType::FILE;
	}
}