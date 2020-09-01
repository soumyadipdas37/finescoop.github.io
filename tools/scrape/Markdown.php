<?php

namespace Tools\Scrape;

use function file_exists;
use function file_put_contents;
use function var_dump;

class Markdown
{
    /**
     * Location of markdown
     *
     * @var string
     */
    private $location = __DIR__ . '/../../source/_posts/';

		/**
		 * Check if the article exists
		 * @param string $title
		 * @return string
		 */
    public function articleExists(string $title): string
		{
				$location = "{$this->location}/{$this->name($title)}.md";

				if (file_exists($location)) {
						return true;
				}

				return false;
		}

    /**
     * Save the article as a markdown
     *
     * @param array $article
     */
    public function save(array $article)
    {
        $location = "{$this->location}/{$this->name($article['title'])}.md";

        // create markdown
        $markdown = $this->generate($article);

        if(!$this->articleExists($article['title'])) {
						file_put_contents($location, $markdown);
				}
    }

    /**
     * Create markdown from article
     *
     * @param array $article
     * @return string
     */
    private function generate(array $article)
    {
        return
            "---\n" .
            "extends: _layouts.post\n" .
            "section: content\n" .
            "image: {$article['image']} \n" .
            "title: {$article['title']} \n" .
            "description: {$article['description']} \n" .
            "date: {$article['date']} \n" .
            "categories: [latest, {$article['category']}] \n" .
            "featured: true \n" .
            "--- \n" .
            "{$article['body']}";
    }

    /**
     * Create a file name from the title
     *
     * @param string $title
     * @return string
     */
    private function name(string $title)
    {
        // replace white space with under score
        $concat = str_replace(' ', '_', $title);

        // alphanumeric and underscores only
        $safeTitle = preg_replace('/\W/', '', $concat);

        return strtolower($safeTitle);
    }
}