<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\WeatherDataService;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends WeatherDataService
{
    private WeatherDataService $weatherDataService;
    public function __construct()
    {

    }

    /**
     * @Route("/weather", name="get_weather_list", methods={GET})
     * @return JsonResponse
     */
    public function weather() : JsonResponse
    {
        $data = [
            'city' => 'Dnipro',
            'temperature' => 42,
        ];
        return $this->json($data);
    }

    /**
     * $Route("/weather", name="html_weather")
     * @return Response
     */
    public function weatherView() : Response
    {
        $data = [
            'city' => 'Dnipro',
            'temperature' => 42,
        ];

        return $this->render('weather.html.twig', $data);
    }
}