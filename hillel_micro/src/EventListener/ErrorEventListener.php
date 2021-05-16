<?php


namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;

class ErrorEventListener
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXEPTION => 'onExeption'
        ];
    }

    public function onExeption(ExeptionEvent $event)
    {
        $exeption = $event->getThowable();
        $data = [
            'message' => $exeption->getMessage(),
            'description' => 'Ololo',
        ];
        $response = new JsonResponse(json_encode($data));
        $event->setResponce($response);
    }
}