<?php

namespace PhpGuru\Blog;

class Page extends Post
{
	public function __construct(string $title, string $content)
	{
		parent::__construct($title, $content);
		$this->postType = PostType::PAGE;
	}
}