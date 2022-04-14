@extends('layouts.master')
@section('title', 'Engines')
@section('content')
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Displacement</th>
            <th>Engine type</th>
        </thead>
        <tbody>
            @foreach ($engines as $engine)
                <tr>
                    <td>{{ $engine['id'] }}</td>
                    <td>{{ $engine['name'] }}</td>
                    <td>{{ $engine['displacement'] }}</td>
                    <td>{{ $engine['engine_type'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection