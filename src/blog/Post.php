<?php

namespace PhpGuru\Blog;

enum PostType
{
	case POST;
	case PAGE;
	case ATTACHMENT;

	public function getType(): string
	{
		return match ($this) {
			self::POST => 'post',
			self::PAGE => 'page',
			self::ATTACHMENT => 'attachment'
		};
	}
}

class Post
{
	private string $title;
	private string $content;
	protected PostType $postType = PostType::POST;

	/**
	 * @param  string  $title
	 * @param  string  $content
	 */
	public function __construct(string $title, string $content)
	{
		$this->title = $title;
		$this->content = $content;
	}

	public function __toString(): string
	{
		return "[{$this->postType->getType()}]{$this->title}";
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param  string  $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getContent(): string
	{
		return $this->content;
	}

	/**
	 * @param  string  $content
	 */
	public function setContent(string $content): void
	{
		$this->content = $content;
	}

	/**
	 * @return PostType
	 */
	public function getPostType(): PostType
	{
		return $this->postType;
	}


}