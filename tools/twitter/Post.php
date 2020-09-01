<?php

namespace Tools\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use function array_slice;
use function arsort;
use function count;
use function getenv;
use function str_replace;
use function var_dump;

class Post
{
		/**
		 * Post constructor.
		 *
		 * @param \Tools\Twitter\string $TWITTER_API_KEY
		 * @param \Tools\Twitter\string $TWITTER_API_SECRET
		 * @param \Tools\Twitter\string $TWITTER_ACCESS_TOKEN
		 * @param \Tools\Twitter\string $TWITTER_ACCESS_TOKEN_SECRET
		 */
    public function __construct(
    		string $TWITTER_API_KEY,
				string $TWITTER_API_SECRET,
				string $TWITTER_ACCESS_TOKEN,
				string $TWITTER_ACCESS_TOKEN_SECRET
		) {
        $this->connection = new TwitterOAuth(
            $TWITTER_API_KEY,
            $TWITTER_API_SECRET,
            $TWITTER_ACCESS_TOKEN,
            $TWITTER_ACCESS_TOKEN_SECRET
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
