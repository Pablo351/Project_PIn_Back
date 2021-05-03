@extends('base')
@section('title') CREAR @endsection
@section('content')

<form action="{{route('contact.store')}}" method="post">
    {{ csrf_field() }}

    <div class="mb-3">
        <label for="Name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="Name" name='Name'>
    </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="text" class="form-control" id="Email" name='Email'>
    </div>
    <div class="mb-3">
        <label for="Phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="Phone" name='Phone'>
    </div>
    <div class="mb-3">
        <label for="Message" class="form-label">Message</label>
        <input type="text" class="form-control" id="Message" name='Message'>
    </div>


    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

