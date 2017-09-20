<?php

Class Page
{
	/**
	 * The page url
	 * @var string
	 */
	protected $url;

	/**
	 * page meta
	 * @var array
	 */
	protected $meta;

	/**
	 * page title
	 * @var string
	 */
	protected $title;

	/**
	 * page content
	 * @var string
	 */
	protected $content;

	/**
	 * Construct a new page object
	 * @param string $url
	 * @param array  $meta
	 * @param string $title
	 * @param string $content
	 */
	public function __construct($url, array $meta, $title, $content)
	{
		$this->url = $url;
		$this->meta = $meta;
		$this->title = $title;
		$this->content = $content;
	}

	public function __get($property)
	{
		if(property_exists($this, $property)){
			return $this->$property;
		}
		return false;
	}

}