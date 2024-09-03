@extends('layouts.app')

@section('content')
    <h1>Lista de Categorias</h1>
    <div>

        <br><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>SLUG</th>
                    <th>DETALLE</th>
                    <th>ELIMINAR</th>
                    <th>Actualizar datos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['slug'] }}</td>

                        <td><a href="{{ route('category.show', $category['id']) }}"><button>Ver más</button></a></td>
                        <td>
                            {{-- <form action="{{ route('apprentices.destroy', $apprentice['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form> --}}
                        </td>
                        {{-- <td><a href="{{ route('apprentices.view', $apprentice['id']) }}"><button>Editar</button></a></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
