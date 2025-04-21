<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()   //http://api.codersfree.test/v1/categories?included=posts
    {

        $url = env('URL_SERVER_API');

        $categories = $this->fetchDataFromApi($url . '/categories');



        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $category = $this->fetchDataFromApi($url . '/categories/' . $id);

        return view('categories.show', compact('category'));
    }
}
