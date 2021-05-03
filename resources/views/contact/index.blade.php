@extends('base')
@section('title') INICIO @endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{ 'ID' }}</th>
                <th>{{ 'NAME' }}</th>
                <th>{{ 'EMAIL' }}</th>
                <th>{{ 'PHONE' }}</th>
                <th>{{ 'MESSAGE' }}</th>

            </tr>
        </thead>
        <tbody>
            {{-- @if (!@empty($contacts)) --}}
            @if (count($contacts) >=1)

                @foreach ($contacts as $contact)
                    <tr>
                        <td scope="row"> {{$contacts -> id}}</td>
                        <td>{{$contact -> name}}</td>
                        <td>{{$contact-> email}}</td>
                        <td>{{$contact -> phone}}</td>
                        <td>{{$contact -> message}}</td>
                        <td> Editar | Borrar</td>

                    </tr>
                @endforeach

            @else
                <td scope="row">NO ENCONTRO RESULTADOS</td>

            @endif


        </tbody>
    </table>
@endsection
