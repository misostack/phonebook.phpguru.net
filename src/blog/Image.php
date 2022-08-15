<?php

namespace PhpGuru\Blog;

class Image extends Attachment
{
	public function __construct(string $title, string $url, string $path, string $mime = '')
	{
		parent::__construct($title, $url, $path, $mime);
		$this->attachmentType = AttachmentType::IMAGE;
	}

	public function __toString(): string
	{
		return "<img src=\"{$this->getUrl()}\" title=\"{$this->getTitle()}\" />";
	}
}