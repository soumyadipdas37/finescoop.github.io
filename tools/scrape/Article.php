<?php

namespace Tools\Scrape;

use function var_dump;

class Article
{
	/**
     * Build the article array
     *
     * @param \SimpleXMLElement $item
     * @param array $feed
     * @return array
     */
    public function build(\SimpleXMLElement $item, array $feed)
    {
        // Get the page content and set the xpath
        $content = $this->getPageContent($item->{$feed['items']['link']});
        $xpath   = new \DOMXPath($content);

        return [
            'date'        => '2020-03-02',
            'category'    => $feed['category'],
            'title'       => (string) $this->safeString($item->{$feed['items']['title']}),
            'description' => (string) $this->safeString($item->{$feed['items']['description']}),
            'body'        => $this->getArticleBody($xpath),
            'image'       => $this->getArticleImage($xpath),
        ];
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
        $doc  = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html);

        return $doc;
    }


    /**
     * Get the article
     *
     * @param \DOMXPath $xpath
     * @return mixed
     */
    private function getArticleBody(\DOMXPath $xpath)
    {
        // Search dom for the article div
        $query = "//*[@itemprop=\"articleBody\"]//p";
        $entry = $xpath->query($query);
		$html = '';

		// Return the article
		foreach($entry as $p) {
			$html .= $p->textContent . "\n\n\n";
		}

		return $html;
    }

    /**
     * Get the article image
     *
     * @param \DOMXPath $xpath
     * @return string
     */
    private function getArticleImage(\DOMXPath $xpath)
    {
        return $xpath->query("//meta[@property='og:image']")[0]
                ->getAttribute("content")
            ?? '/assets/images/breaking.jpg';
    }

    /**
     * Remove any colons for the markdown
     *
     * @param string $string
     * @return string
     */
    private function safeString(string $string)
    {
//				return str_replace([':', "'", '"', '*'], '', trim($string));
				return str_replace([':', '*', "\r\n", "\r", "\n"], '', trim($string));
    }
}