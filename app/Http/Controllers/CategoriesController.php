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
        // return $categories;
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $category = $this->fetchDataFromApi($url . '/categories/' . $id);

        return view('categories.show', compact('category'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $posts = Http::get($url . '/posts')->json();

        return view('categories.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/categories',['name' => $request->name,]);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $category = $this->fetchDataFromApi($url . '/categories/' . $id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/categories/' . $id, $request->all());

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/categories/' . $id);
        return redirect()->route('categories.index');
    }
}
