#Channels

To grab information from a channel simply do:

    $channelFollows = $Twitch->channel($channelName, $requestedInfo);

Figuring out if the channel "lirik" is mature or not is as easy as below:

    $mature = $Twitch->channel('lirik', 'mature');
    
This will retrieve a boolean result.


Here is a list of shortcut options for the 2nd parameter of "channel" method.

- "follows" - gets the amount of followers
- "id" - gets the id of the channel
- "banner" - gets the url of the image used for the channel banner
