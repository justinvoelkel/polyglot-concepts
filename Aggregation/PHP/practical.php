<?php

trait Encapsulated
{
    public function __set($property, $value)
    {
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
    }

    public function __get($property)
    {
        if(property_exists($this, $property))
        {
            return $this->$property;
        }
        return $this;
    }
}

Class Page
{
    use Encapsulated;

    private $url;
    private $content;
    private $views;
}

Class BlogPost
{
    use Encapsulated;

    private $page;
    private $author;
    private $categories = [];
    private $comments = [];

    public function __construct(Page $page, Author $author)
    {
        $this->page = $page;
        $this->author = $author;
    }

    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }
}

Class Author
{
    use Encapsulated;

    private $name;
    private $picture;
    private $description;
}

class Category
{
    private $name;
    private $description;
}

Class Comment
{   
    use Encapsulated;

    private $author;
    private $content;
    private $likes;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }
}
// web pages and blog posts
$pages = [];
//set up the basic instance of page
$home = new Page();
// set up a home page
$home->url = "/";
$home->content = "Welcome Home!";
// add home page to our pages
$pages[] = $home;

//set up a blog page
$blog = new Page();
$blog->url = "/blog";
$blog->content = "Lots of great posts hree!";
// add blog to pages
$pages[] = $blog;

//set up a blog post
$post = new Page();
$post->url = "/blog/practical-aggregation";
$author = new Author();
$author->name = "Maisey Voelkel";
$author->picture = "./images/doggo.jpg";
$author->description = "smartest doggo ever";
$post = new BlogPost($post, $author);
$pages[] = $post;

//set up a comment and add it to the blog post
$author = new Author();
$author->name = "Justin Voelkel";
$comment = new Comment($author);
$comment->content = "You are a smart doggo, Maisey!";
$post->addComment($comment);
