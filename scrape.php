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
        foreach ($rss->channel->item as $item) {

            // Get the page content and set the xpath
            $content = $this->getPageContent($item->link);
            $xpath   = new DOMXPath($content);

            // Get the title, article, image and description
            $article = [
                'date'        => '2020-03-02',
                'title'       => (string) $this->safeString($item->title),
                'description' => (string) $this->safeString($item->description),
                'body'        => $this->getArticleBody($xpath),
                'image'       => $this->getArticleImage($xpath),
            ];

            $this->createAndSave($article);
        }
    }

    /**
     * Save the article as a markdown
     * @param array $article
     */
    private function createAndSave(array $article)
    {
        $location = 'source/_posts/test/' . $this->fileName($article['title']);

        // create markdown
        $markdown = $this->createMarkdown($article);

        file_put_contents($location, $markdown);
    }

    /**
     * Create markdown from article
     *
     * @param array $article
     * @return string
     */
    private function createMarkdown(array $article)
    {
        return
            "---\n" .
            "extends: _layouts.post\n" .
            "section: content\n" .
            "image: {$article['image']} \n" .
            "title: {$article['title']} \n" .
            "description: {$article['description']} \n" .
            "date: 2020-03-02 \n" .
            "categories: [ps4] \n" .
            "featured: true \n" .
            "--- \n" .
            "{$article['body']}";
    }

    /**
     * Remove any colons for the markdown
     *
     * @param string $string
     * @return string
     */
    public function safeString(string $string)
    {
        return str_replace(':', '', trim($string));
    }

    /**
     * Create a file name from the title
     *
     * @param string $title
     * @return string
     */
    private function fileName(string $title)
    {
        // replace white space with under score
        $concat = str_replace(' ', '_', $title);

        // alphanumeric and underscores only
        $safeTitle = preg_replace('/\W/', '', $concat);

        return strtolower($safeTitle);
    }

    /**
     * Get the article
     *
     * @param DOMXPath $xpath
     * @return mixed
     */
    private function getArticleBody(DOMXPath $xpath)
    {
        // Search dom for the article div
        $query = "//*[@id=\"js-article-text\"]/div[2]";
        $entry = $xpath->query($query);

        // Return the article
        return $entry[0]->nodeValue;
    }

    /**
     * Get the article image
     *
     * @param DOMXPath $xpath
     * @return string
     */
    private function getArticleImage(DOMXPath $xpath)
    {
        return $xpath->query("//meta[@property='og:image']")[0]
                ->getAttribute("content")
            ?? '/assets/images/breaking.jpg';
    }

    /**
     * Get the page contents
     *
     * @param string $uri
     * @return \DOMDocument
     */
    private function getPageContent(string $uri)
    {
        // Remove whitespace
        $uri = trim($uri);

        // Get the html and load it to dom
        $html = file_get_contents($uri);
        $doc  = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html);

        return $doc;
    }
}

(new Scrape())->parseRssFeed();