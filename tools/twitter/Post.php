<?php

namespace Tools\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use function getenv;
use function var_dump;

class Post
{
    /**
     * @var string
     */
    private $API_KEY = "0IWHDqoKrJbHlfkRNrrkUj4Dw";

    /**
     * @var string
     */
    private $API_SECRET = "OnToe4zd77sxGxG7McCj1kTmY7myNMuQ4NoCzhFnLKMuZq7S6r";

    /**
     * @var string
     */
    private $ACCESS_TOKEN = "1245530453903388677-sj6MPgen4HgvsHWasgKppMAGhSbyoC";

    /**
     * @var string
     */
    private $ACCESS_TOKEN_SECRET = "CC1YeO3tUoRKkWi9bcd098ZXx4aCiIGkYFZ5mhQhIfGUQ";

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->connection = new TwitterOAuth(
            $this->API_KEY,
            $this->API_SECRET,
            $this->ACCESS_TOKEN,
            $this->ACCESS_TOKEN_SECRET
        );

        $content = $this->connection->get("account/verify_credentials");
    }

    public function check()
    {

    }

    public function post()
    {
        $statues = $this->connection->post("statuses/update", ["status" => "hello world"]);

        var_dump($statues);
    }
}

// Autoload scrape classes
require __DIR__ . '/../../vendor/autoload.php';

(new Post())->post();


