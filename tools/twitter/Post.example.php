<?php

namespace Tools\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use function getenv;
use function var_dump;

class PostExample
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
    }

    /**
     * Post a status
     *
     * @param string $status
     * @return array|object
     */
    public function post(string $status)
    {
        return $this->connection->post("statuses/update", ["status" => $status]);
    }
}

