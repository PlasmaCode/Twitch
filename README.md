# TwitchAPI


**Requirements:**
- Composer
- php 5.4

**Install:**
If you do not have a composer.json file already then create one, and put the following code inside:

    {
        "require": {
            "PlasmaCode/Twitch",
        }
    }


Create an instance of this TwitchAPI with the following code:

    use PlasmaCode\Twitch;
    
    $Twitch = new Api;
