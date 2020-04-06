<?php

namespace Tools\Scrape;

use function get_class;
use function get_resource_type;

class Scrape
{

    /**
     * RSS Feeds
     * @var array
     */
    public $feeds = [
        [
            'uri'      => 'https://www.dailymail.co.uk/articles.rss',
            'image'    => '//meta[@property=\'og:image\']',
            'content'  => '//*[@id=\'js-article-text\']/div[2]',
            'category' => 'latest',
            'items'    => [
                'channel'     => 'channel',
                'item'        => 'item',
                'link'        => 'link',
                'title'       => 'title',
                'description' => 'description',
            ]
        ],
    ];

    /**
     * @var \Tools\Scrape\Article
     */
    private $article;

    /**
     * @var \Tools\Scrape\Markdown
     */
    private $markdown;

    /**
     * @var \Tools\Scrape\Feed
     */
    private $feed;

    /**
     * Scrape constructor.
     */
    public function __construct()
    {
        $this->article  = new Article();
        $this->markdown = new Markdown();
        $this->feed     = new Feed();
    }

    public function parseRssFeed()
    {
        while (true) {

            // Loop through rss feeds
            foreach ($this->feeds as $feed) {

                // Get the rss feed
                $rss = simplexml_load_file($feed['uri']);

                foreach ($rss->{$feed['items']['channel']}
                             ->{$feed['items']['item']}
                         as $item) {

                    // So I know what article I am on
                    print "Generating article: " . trim($item->{$feed['items']['title']}) . "\n";

                    // Build the article array
                    $article = $this->article->build($item, $feed);

                    $this->markdown->save($article);
                }
            }

        }

    }
}

// Autoload scrape classes
require __DIR__ . '/../../vendor/autoload.php';

(new Scrape())->parseRssFeed();