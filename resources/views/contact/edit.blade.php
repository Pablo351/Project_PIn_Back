@extends('base')
@section('title') EDITAR @endsection
@section('content')

<form action="{{route('contact.update' , $contact->id)}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH')}}

    <div class="mb-3">
        <label for="Name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="Name" name='Name' value="{{$contact->Name}}">
    </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="text" class="form-control" id="Email" name='Email' value="{{$contact->Email}}">
    </div>

    <div class="mb-3">
        <label for="Phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="Phone" name='Phone' value="{{$contact->Phone}}">
    </div>

    <div class="mb-3">
        <label for="Message" class="form-label">Message</label>
        <input type="text" class="form-control" id="Message" name='Message' value="{{$contact->Message}}">
    </div>


    <button type="submit" class="btn btn-primary">Guardar Edicion</button>

</form>

@endsection
