<?php

namespace Tools\Twitter;

use DOMDocument;
use DOMXPath;
use Tools\Twitter\Post;

class Find
{
    /**
     * @var \Tools\Twitter\Post
     */
    private $post;

    /**
     * Find constructor.
     */
    public function __construct()
    {
        $this->post = new Post();
    }

    public function getArticles()
    {
        $dom = new \DOMDocument('http://finescoop.com');
        $xpath = new DOMXPath($dom);

        $items = $xpath->query('div.article-post');
        var_dump($items);
    }
}



// Autoload scrape classes
require __DIR__ . '/../../vendor/autoload.php';

(new Find)->getArticles();
