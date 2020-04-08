<?php

namespace Tools\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use function array_slice;
use function arsort;
use function count;
use function getenv;
use function str_replace;
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

    /**
     * Check if status has already been posted
     *
     * @param string $status
     * @return bool
     */
    public function check(string $status)
    {
        $query = "@finescoop {$status}";
        $statuses = $this->connection->get("search/tweets", ["q" => $query]);

        return count($statuses->statuses) < 1;
    }

    /**
     * Return top trends
     *
     * @return array|object
     */
    public function trends()
    {
        $trends = $this->connection->get("trends/place", ['id' => 1]);
        $filtered = [];
        foreach($trends[0]->trends as $trend) {
            $filtered[
            str_replace('#', '', $trend->name)
            ] = $trend->tweet_volume;
        }

        // Sort and return 5
        arsort($filtered);
        return array_slice($filtered, 0, 3, true);
    }
}
