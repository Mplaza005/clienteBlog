@extends('layouts.app')

@section('content')
    <table>
        <br><br>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>{{ $category['id'] }}</td> 
                <td>{{ $category['name'] }}</td>
                <td>{{ $category['slug'] }}</td>
            </tr>

        </tbody>
    </table>
@endsection
