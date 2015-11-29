# Twitter REST API Wrapper 

Client interface for accessing [Twitter REST API](https://dev.twitter.com/rest/public).

## Usage
Create a client object to connect to Twitter API endpoints.

```PHP
var $client = new wrapi\twitter([
      "consumer_key" => 'CONSUMER_KEY',
      "consumer_secret" => 'CONSUMER_SECRET',
      "token" => 'ACCESS_TOKEN',
      "token_secret" => 'ACCESS_TOKEN_SECRET'
    ]
);

// Now you are ready to make API calls to twitter.
```

Provide API parameters to the calls. 

API calls follow this syntax:

`$client->apigroup->action(param1, ..., queryString);`

* `param` - (*if required*) url parameters - eg: For [statuses->show](#statuses.show) the value for `:id`.
* `queryString` - (*as required*) API endpoint parameters as key-value pairs.

### Examples

#### List Twitter suggested user categories
```PHP
$data = $client->users->suggestions->get();
```

#### Fetch Single Tweet
```PHP
$tweet = $client->statuses->show(23);
```

#### Get User Profile
```PHP
$profile = $client->users->show(array("screen_name" => "jack"));
```

#### Friends List
```PHP
$friends = $client->friends->list(array(
		"cursor" => -1,
		"screen_name" => "twitterapi",
		"skip_status" => true,
		"include_user_entities" => false	
	)
);
```

#### Search
```PHP
$tweets = $client->search->tweets(array(
		"q" => "#freebandnames",
		"since_id" => "24012619984051000",
		"max_id" => "250126199840518145",
		"result_type" => "mixed",
		"count" => 4
	)
);
```
#### Create a saved search
This is a **POST** method call that expects a `body` content. Pass `NULL`, if body is not required.
```PHP
$mySearches = $client->saved_searches->create(array("query" => "sandwiches"), NULL);
```

## API Functions

### Statuses
* [statuses->mentions_timeline](https://dev.twitter.com/rest/reference/get/statuses/mentions_timeline)
* [statuses->user_timeline](https://dev.twitter.com/rest/reference/get/statuses/user_timeline)
* [statuses->home_timeline](https://dev.twitter.com/rest/reference/get/statuses/home_timeline)
* [statuses->retweets_of_me](https://dev.twitter.com/rest/reference/get/statuses/retweets_of_me)
* [statuses->retweets](https://dev.twitter.com/rest/reference/get/statuses/retweets/:id)
* [statuses->show](https://dev.twitter.com/rest/reference/get/statuses/show/:id)
* [statuses->destroy](https://dev.twitter.com/rest/reference/post/statuses/destroy/:id)
* [statuses->update](https://dev.twitter.com/rest/reference/post/statuses/update)
* [statuses->retweet](https://dev.twitter.com/rest/reference/post/statuses/retweet/:id)
* [statuses->update_with_media](https://dev.twitter.com/rest/reference/post/statuses/update_with_media)
* [statuses->oembed](https://dev.twitter.com/rest/reference/get/statuses/oembed)
* [statuses->retweeters->ids](https://dev.twitter.com/rest/reference/get/statuses/retweeters/ids)
* [statuses->lookup](https://dev.twitter.com/rest/reference/get/statuses/lookup)

### Media
* [media->upload](https://dev.twitter.com/rest/reference/post/media/upload)
* [media->upload_chunked](https://dev.twitter.com/rest/reference/post/media/upload_chunked)

### Direct_messages
* [direct_messages->get](https://dev.twitter.com/rest/reference/get/direct_messages)
* [direct_messages->sent](https://dev.twitter.com/rest/reference/get/direct_messages/sent)
* [direct_messages->show](https://dev.twitter.com/rest/reference/get/direct_messages/show)
* [direct_messages->destroy](https://dev.twitter.com/rest/reference/post/direct_messages/destroy)
* [direct_messages->new](https://dev.twitter.com/rest/reference/post/direct_messages/new)

### Search
* [search->tweets](https://dev.twitter.com/rest/reference/get/search/tweets)

### Friendships
* [friendships->no_retweets](https://dev.twitter.com/rest/reference/get/friendships/no_retweets/ids)
* [friendships->incoming](https://dev.twitter.com/rest/reference/get/friendships/incoming)
* [friendships->outgoing](https://dev.twitter.com/rest/reference/get/friendships/outgoing)
* [friendships->create](https://dev.twitter.com/rest/reference/post/friendships/create)
* [friendships->update](https://dev.twitter.com/rest/reference/post/friendships/update)
* [friendships->show](https://dev.twitter.com/rest/reference/get/friendships/show)
* [friendships->lookup](https://dev.twitter.com/rest/reference/get/friendships/lookup)

### Friends
* [friends->ids](https://dev.twitter.com/rest/reference/get/friends/ids)
* [friends->list](https://dev.twitter.com/rest/reference/get/friends/list)

### Followers
* [followers->ids](https://dev.twitter.com/rest/reference/get/followers/ids)
* [followers->list](https://dev.twitter.com/rest/reference/get/followers/list)

### Account
* [account->account](https://dev.twitter.com/rest/reference/get/account/settings)
* [account->verify_credentials](https://dev.twitter.com/rest/reference/get/account/verify_credentials)
* [account->settings](https://dev.twitter.com/rest/reference/post/account/settings)
* [account->update_delivery_device](https://dev.twitter.com/rest/reference/post/account/update_delivery_device)
* [account->update_profile](https://dev.twitter.com/rest/reference/post/account/update_profile)
* [account->update_profile_background_image](https://dev.twitter.com/rest/reference/post/account/update_profile_background_image)
* [account->update_profile_image](https://dev.twitter.com/rest/reference/post/account/update_profile_image)

### Blocks
* [blocks->list](https://dev.twitter.com/rest/reference/get/blocks/list)
* [blocks->ids](https://dev.twitter.com/rest/reference/get/blocks/ids)
* [blocks->create](https://dev.twitter.com/rest/reference/post/blocks/create)
* [blocks->destroy](https://dev.twitter.com/rest/reference/post/blocks/destroy)

### Users
* [users->lookup](https://dev.twitter.com/rest/reference/get/users/lookup)
* [users->show](https://dev.twitter.com/rest/reference/get/users/show)
* [users->search](https://dev.twitter.com/rest/reference/get/users/search)
* [users->profile_banner](https://dev.twitter.com/rest/reference/get/users/profile_banner)
* [users->report_spam](https://dev.twitter.com/rest/reference/post/users/report_spam)

#### Suggestions
* [users->suggestions.get](https://dev.twitter.com/rest/reference/get/users/suggestions)
* [users->suggestions.slug](https://dev.twitter.com/rest/reference/get/users/suggestions/:slug)
* [users->suggestions.members](https://dev.twitter.com/rest/reference/get/users/suggestions/:slug/members)

### Favorites
* [favorites->list](https://dev.twitter.com/rest/reference/get/favorites/list)
* [favorites->create](https://dev.twitter.com/rest/reference/post/favorites/create)
* [favorites->destroy](https://dev.twitter.com/rest/reference/post/favorites/destroy)

### Lists
* [lists->list](https://dev.twitter.com/rest/reference/get/lists/list)
* [lists->statuses](https://dev.twitter.com/rest/reference/get/lists/statuses)
* [lists->memberships](https://dev.twitter.com/rest/reference/get/lists/memberships)
* [lists->destroy](https://dev.twitter.com/rest/reference/post/lists/destroy)
* [lists->update](https://dev.twitter.com/rest/reference/post/lists/update)
* [lists->create](https://dev.twitter.com/rest/reference/post/lists/create)
* [lists->show](https://dev.twitter.com/rest/reference/get/lists/show)
* [lists->subscriptions](https://dev.twitter.com/rest/reference/get/lists/subscriptions)
* [lists->ownerships](https://dev.twitter.com/rest/reference/get/lists/ownerships)

#### Members
* [lists->members->get](https://dev.twitter.com/rest/reference/get/lists/members)
* [lists->members->destroy](https://dev.twitter.com/rest/reference/post/lists/members/destroy)
* [lists->members->create_all](https://dev.twitter.com/rest/reference/post/lists/members/create_all)
* [lists->members->show](https://dev.twitter.com/rest/reference/get/lists/members/show)
* [lists->members->create](https://dev.twitter.com/rest/reference/post/lists/members/create)
* [lists->members->destroy_all](https://dev.twitter.com/rest/reference/post/lists/members/destroy_all)

#### Subscribers
* [lists->subscribers->get](https://dev.twitter.com/rest/reference/get/lists/subscribers)
* [lists->subscribers->create](https://dev.twitter.com/rest/reference/post/lists/subscribers/create)
* [lists->subscribers->show](https://dev.twitter.com/rest/reference/get/lists/subscribers/show)
* [lists->subscribers->destroy](https://dev.twitter.com/rest/reference/post/lists/subscribers/destroy)

### Saved_searches
* [saved_searches->list](https://dev.twitter.com/rest/reference/get/saved_searches/list)
* [saved_searches->show](https://dev.twitter.com/rest/reference/get/saved_searches/show/:id)
* [saved_searches->create](https://dev.twitter.com/rest/reference/post/saved_searches/create)
* [saved_searches->destroy](https://dev.twitter.com/rest/reference/post/saved_searches/destroy/:id)

### Geo
* [geo->id](https://dev.twitter.com/rest/reference/get/geo/id/:place_id)
* [geo->reverse_geocode](https://dev.twitter.com/rest/reference/get/geo/reverse_geocode)
* [geo->search](https://dev.twitter.com/rest/reference/get/geo/search)
* [geo->place](https://dev.twitter.com/rest/reference/post/geo/place)

### Trends
* [trends->place](https://dev.twitter.com/rest/reference/get/trends/place)
* [trends->available](https://dev.twitter.com/rest/reference/get/trends/available)
* [trends->closest](https://dev.twitter.com/rest/reference/get/trends/closest)

### Application
* [application->rate_limit_status](https://dev.twitter.com/rest/reference/get/application/rate_limit_status)

### Help
* [help->configuration](https://dev.twitter.com/rest/reference/get/help/configuration)
* [help->languages](https://dev.twitter.com/rest/reference/get/help/languages)
* [help->privacy](https://dev.twitter.com/rest/reference/get/help/privacy)
* [help->tos](https://dev.twitter.com/rest/reference/get/help/tos)

## License

  [MIT](LICENSE)


