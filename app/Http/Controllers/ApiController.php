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
        public function nose()
        {
            
            return $request = $client->request('GET','550?api_key=6f942a480ac7cb21ac1fdf860420ecd2');
        }
}
