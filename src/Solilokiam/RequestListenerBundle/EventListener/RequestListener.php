<?php
namespace Solilokiam\RequestListenerBundle\EventListener;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Solilokiam\RequestListenerBundle\Detector\DeviceDetector;

class RequestListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $detector = new DeviceDetector();
        $request = $event->getRequest();
        $user_agent = $request->headers->get('user-agent');

        if($detector->isMobile($user_agent))
        {
            $request->setRequestFormat('mobile', 'text/html');
        } elseif($detector->isGameConsole($user_agent)) {
            $request->setRequestFormat('game', 'text/html');
        } elseif($detector->isTv($user_agent)) {
            $request->setRequestFormat('tv', 'text/html');
        } else {
            $request->setRequestFormat('html', 'text/html');
        }
    }

    private function setFormat (\Symfony\Component\HttpFoundation\Request $request, $format='html') {
        $request->setRequestFormat($format, 'text/html');
    }
}
