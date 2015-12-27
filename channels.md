#Channels

To grab information from a channel simply do:

    //both parameters are a string
    $channelFollows = $Twitch->channel($channelName, $requestedInfo);

Figuring out if the channel "lirik" is mature or not is as easy as below:

    $mature = $Twitch->channel('lirik', 'mature');
    
This will retrieve a boolean result.


Here is a list of shortcut options for the 2nd parameter of "channel" method.

- follows - gets the amount of followers
- id - gets the id of the channel
- banner - gets the url of the image used for the channel banner
- mature - 1 or true if specified channel is mature
- status - gets the last status message of specified channel]
- language - gets the channel language
- display_name - gest the name displayed to users on twitch
- name - gets the username of the channel
- logo - gets the url of the image used as the channel logo
- views - gets the total amount of channel views
- url - gets the url for the specified channel
