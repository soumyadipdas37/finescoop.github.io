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
    private $API_KEY = "";

    /**
     * @var string
     */
    private $API_SECRET = "";

    /**
     * @var string
     */
    private $ACCESS_TOKEN = "";

    /**
     * @var string
     */
    private $ACCESS_TOKEN_SECRET = "";

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


