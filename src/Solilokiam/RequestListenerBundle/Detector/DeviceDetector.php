<?php
namespace Solilokiam\RequestListenerBundle\Detector;

class DeviceDetector
{
    //Incomplete regexs just educational purpouse;

    private $mobile_device_regex = '/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i';
    private $game_console_device_regex = '/xbox/i';
    private $tv_device_regex = '/(bravia|googletv)/i';

    public function __construct()
    {

    }

    public function isMobile($user_agent)
    {
        if(preg_match($this->mobile_device_regex,$user_agent))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isGameConsole($user_agent)
    {
        if(preg_match($this->game_console_device_regex,$user_agent))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isTv($user_agent)
    {
        if(preg_match($this->tv_device_regex,$user_agent))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}