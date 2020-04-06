<?php

namespace Tools\Twitter;

use DOMDocument;
use DOMXPath;
use Tools\Twitter\Post;
use function array_push;
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
        while(true) {

            // get articles for first page
            $articles = $this->getArticles();

            // loop through and check if posted
            foreach($articles as $article) {
                $post = "{$article['title']} {$article['uri']}";
                print($post);
            }
            // check for page 2
        }
    }

    /**
     * Get all the articles
     *
     * @return array
     */
    private function getArticles()
    {
        // Get the content
        $dom   = $this->getContent($this->uri);
        $xpath = new \DOMXPath($dom);

        // Loops through items, and create array of articles
        $articles = [];
        $items = $xpath->query('//*[@class="article-post"]');
        foreach ($items as $item) {
            $title       = $xpath->query('descendant::div[contains(@class, "article-title")]', $item);
            $description = $xpath->query('descendant::p[contains(@class, "article-description")]', $item);
            $article     = [
                'uri'         => $item->getAttribute("href"),
                'title'       => trim($title[0]->textContent),
                'description' => trim($description[0]->textContent),
            ];
            array_push($articles, $article);
        }

        return $articles;
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
        libxml_use_internal_errors(true);
        $dom->loadHTMLFile($uri);

        return $dom;
    }
}

// Autoload scrape classes
require __DIR__ . '/../../vendor/autoload.php';

(new Find)->run();
