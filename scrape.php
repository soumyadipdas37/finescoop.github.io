<?php

class Scrape
{
    /**
     * RSS Feeds
     * @var array
     */
    public $feeds = [
        'https://www.dailymail.co.uk/articles.rss'
    ];

    public function parseRssFeed()
    {
        $rss = simplexml_load_file('https://www.dailymail.co.uk/articles.rss');
        foreach($rss->channel->item as $item) {
            print(
                $this->getArticleBody($item->link)
            );
        }
    }

    /**
     * Get the article
     * @param string $uri
     * @return string
     */
    private function getArticleBody(string $uri)
    {
        // Remove whitespace
        $uri = trim($uri);

        // Get the html and load it to dom
        $html = file_get_contents($uri);
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html);

        // Search dom for the article div
        $xpath = new DOMXPath($doc);
        $query = "//*[@id=\"js-article-text\"]/div[2]";
        $entry = $xpath->query($query);

        // Return the article
        return $entry[0]->nodeValue;
    }
}

(new Scrape())->parseRssFeed();