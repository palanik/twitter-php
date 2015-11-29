<?php

namespace wrapi;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class twitter extends wrapi {
    /*
    [
      "consumer_key" => 'CONSUMER_KEY',
      "consumer_secret" => 'CONSUMER_SECRET',
      "token" => 'ACCESS_TOKEN',
      "token_secret" => 'ACCESS_TOKEN_SECRET'
    ]
    */
    public function __construct($authKeys = array()) {

        $opts = array(
            "headers" => array(
                "User-Agent" => "twitter-wrapi"
            ),
            "query" => array(
                "stringify_ids" => "true"
            ),
            'auth' => 'oauth'
        );

        $handler = HandlerStack::create();
        $handler->push(new Oauth1($authKeys));

        function build(&$obj, $prefix, $apiList) {
            $path = $prefix;
            if ($prefix !== '') {
                $path .= '/';
            }

            foreach ($apiList as $name) {
                $json = file_get_contents(__DIR__. '/api/'. $path. $name. '.json');
                $endpoint = json_decode($json, true);
                $pre = ($prefix === '') ? $name : ($prefix. '.'. $name);
                foreach ($endpoint as $sub => $ep) {
                    $obj[$pre. '.'.  $sub] = $ep;
                }
            }
        }

        $all = [];
        build($all, 
            '',
            [
                'statuses',
                'media',
                'direct_messages',
                'search',
                'friendships',
                'friends',
                'followers',
                'account',
                'blocks',
                'users',
                'favorites',
                'lists',
                'saved_searches',
                'geo',
                'trends',
                'application',
                'help'
            ]
        );
        build($all, 'users', ['suggestions']);
        build($all, 'lists', ['members', 'subscribers']);

        parent::__construct('https://api.twitter.com/1.1/',
            $all,
            $opts,
            ['handler' => $handler]);

    }

}

?>
