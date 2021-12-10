<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $API_KEY = 'oOAFOTmJAzdKGtafIRzrRrlbue4I76ib1tB72qm5';

    public function index()
    {

        return view('get_photos');
    }

    public function getMarsRoverPhotos(Request $request)
    {
        $earth_date = $request->get('date');
        $camera = $request->get('camera');

        $url = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=' . $earth_date . '&camera=' . $camera . '&api_key=' . $this->API_KEY;
        $response = file_get_contents($url);

        return $response;
    }
}
