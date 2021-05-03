@extends('base')
@section('title') INICIO @endsection
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="btn btn-primary" aria-current="page" href="{{route('contact.create')}}">CREAR</a>
          </li>
        </ul>
        <form action="{{ route('contact.search') }}" method="POST" class="d-flex">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar">
                <span class="input-group-btn">
                    <button class="btn btn-outline-info" type="submit"><span class="fas fa-search" aria-hidden="true"></span> Buscar</button>
                </span>
            </div>
        </form>
      </div>
    </div>
  </nav>

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
                        <td scope="row"> {{$contact -> id}}</td>
                        <td>{{$contact -> Name}}</td>
                        <td>{{$contact-> Email}}</td>
                        <td>{{$contact -> Phone}}</td>
                        <td>{{$contact -> Message}}</td>
                        <td>
                            <a href="{{ route('contact.edit',$contact->id) }}" class="btn btn-primary">EDITAR</a>
                            <form action="{{ route ('contact.destroy', $contact->id) }}" method="post">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Desea eliminar el registro?)">ELIMINAR</button>

                            </form>
                        </td>

                    </tr>
                @endforeach

            @else
                <td scope="row">NO ENCONTRO RESULTADOS</td>

            @endif


        </tbody>
    </table>
@endsection
