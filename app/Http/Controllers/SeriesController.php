<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
       $series = [
            'Game of Thrones',
            'Os Simpsons',
            'Penny Dreadful'
       ];

        $html = "<ul>";
        foreach ($series as $serie)
        {
            $html .="<li>$serie</li>";
        }
        $html .= "</ul>";

        return $html;

    }
}
