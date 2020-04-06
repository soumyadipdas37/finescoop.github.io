<?php

namespace Tools\Twitter;

use DOMDocument;
use DOMXPath;
use Tools\Twitter\Post;
use function var_dump;

class Find
{
    /**
     * Front page with latest articles
     *
     * @var string
     */
    private $uri = 'http://finescoop.com';

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

    /**
     * Run the tool
     */
    public function run()
    {
        $articles = $this->getArticles();

        var_dump($articles);
    }

    /**
     * Get all the articles
     *
     * @return \DOMNodeList|false
     */
    private function getArticles()
    {
        // Get the content
        $dom = $this->getContent($this->uri);

        $xpath = new \DOMXPath($dom);

        // Loops through items, and create array of articles
        $items = $xpath->query("//*[@class=\"article-post\"]");
        foreach($items as $item) {
            $title = $xpath->query("descendant::*[@class='article-title']", $item);
            $description = $xpath->query("descendant::*[@class='article-description']", $item);
            var_dump($title);
        }

        return [
            'title' => $title,
            '$description' => $description,
        ];
    }

    /**
     * Get the html of the website
     *
     * @param string $uri
     * @return \DOMDocument
     */
    private function getContent(string $uri)
    {
        $dom = new \DOMDocument();
        $dom->loadHTMLFile($uri);

        return $dom;
    }
}

// Autoload scrape classes
require __DIR__ . '/../../vendor/autoload.php';

(new Find)->run();
