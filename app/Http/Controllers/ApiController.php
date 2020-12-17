<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class ApiController extends Controller
{
    private $client;
        public function __construct()
        {
            $this->client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://api.themoviedb.org/3/movie/',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
        }
        public function index(/* $movieRequest */)
        {
            $movieRequest = "now_playing";
            $movieArray = array();
            for($i = 1 ; $i<6 ; $i++)
            {
                return $request = $this->client->request('GET',"$movieRequest?api_key=6f942a480ac7cb21ac1fdf860420ecd2&language=en-US&page=$i")/* ->getBody() */;
                array_push($movieArray,$request);
            }
            return $movieArray;
        }
}
