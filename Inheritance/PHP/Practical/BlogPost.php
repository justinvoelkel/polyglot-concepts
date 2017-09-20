<?php
// importing page class - typically namespaced and autoloaded
require_once("./Page.php");

// required for the datetime
date_default_timezone_set("America/New_York");

Class BlogPost extends Page
{
	/**
	 * author of the post
	 * @var string
	 */
	protected $author;

	/**
	 * the post's category
	 * @var string
	 */
	protected $category;

	/**
	 * the date the post was published
	 * @var datetime
	 */
	protected $published_at;

	/**
	 * Construct a blog post.
	 * This is a specific variation of our base page
	 * @param string   $author
	 * @param string  $category
	 * @param datetime $published_at
	 */
	public function __construct($url, array $meta, $title, $content,$author, $category, datetime $published_at)
	{
		// we have to construct the parent with the appropriate data
		parent::__construct($url, $meta, $title, $content);
		// now we can set up our specific post properties
		$this->author = $author;
		$this->category = $category;
		$this->published_at = $published_at;
	}
}
// setting up some faux meta data
$meta = [
	"description" => "Learn more about how sneaky cats are",
	"keywords" => "sneaky, heckin cats, trust, dogs rule"
];

// we can set up a normal page with basic properties
$page = new Page("dont-trust-cats.php", $meta, "Don't Trust a Cat", "Some content goes here");

// we can set up a blog post by passing in the basic page properties 
// and our specific blog post properties $author, $category, and $published_at
$post = new BlogPost("/post/tennis-ball-theory.php", $meta, "Advanced Tennis Ball Theory", "Why are they so addicting?", "Lord Woofington", "Theories and Proofs", new datetime('now'));

echo $page->title.PHP_EOL;

echo $post->published_at->format('Y-m-d H:i:s').PHP_EOL;