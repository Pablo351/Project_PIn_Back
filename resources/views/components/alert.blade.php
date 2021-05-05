@foreach (['Danger', 'Warning', 'Success', 'info'] as $smg)
    @if (Session::has("alert-$smg"))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{Session::get('alert-'.$smg)}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach
