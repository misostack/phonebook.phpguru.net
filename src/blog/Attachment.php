<?php

namespace PhpGuru\Blog;

enum AttachmentType
{
	case IMAGE;
	case FILE;
}

abstract class Attachment extends Post
{
	private string $url;
	private string $path;
	private string $mime;
	protected AttachmentType $attachmentType;

	public function __construct(
		string $title,
		string $url,
		string $path,
		string $mime = ''
	) {
		parent::__construct($title, '');
		$this->postType = PostType::ATTACHMENT;
		$this->url = $url;
		$this->path = $path;
		$this->mime = $mime;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param  string  $url
	 */
	public function setUrl(string $url): void
	{
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getPath(): string
	{
		return $this->path;
	}

	/**
	 * @param  string  $path
	 */
	public function setPath(string $path): void
	{
		$this->path = $path;
	}

	/**
	 * @return AttachmentType
	 */
	public function getAttachmentType(): AttachmentType
	{
		return $this->attachmentType;
	}

	/**
	 * @return string
	 */
	public function getMime(): string
	{
		return $this->mime;
	}
}