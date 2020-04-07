<?php

namespace Tools\Twitter;

use DOMDocument;
use DOMXPath;
use Tools\Twitter\Post;
use function array_push;
use function implode;
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
        $this->post = new Post;
    }

    /**
     * Run the tool
     */
    public function run()
    {
        while(true) {

            // Get the trends for the day
            $trends = $this->post->trends();
            $tags = "";
            foreach($trends as $key => $value) {
                $tags .= "#{$key} ";
            }

            // Loops through pages and post to twitter
            for($page = 1; $page < 4; $page++) {

                // Page url to scrape
                $uri = $page === 1 ? $this->uri : "{$this->uri}/{$page}/";

                // get articles
                $articles = $this->getArticles($uri);

                // loop through and check if posted
                foreach ($articles as $article) {
                    $post = "{$article['title']} {$tags} {$article['uri']}";
                    $this->post->post($post);
                    sleep(180);
                }
            }
        }
    }

        /**
         * Get all the articles
         *
         * @param string $uri
         * @return array
         */
    private function getArticles(string $uri)
    {
        // Get the content
        $dom   = $this->getContent($uri);
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
