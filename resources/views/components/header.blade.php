<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route("home")}}">MAL-MED</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            {{-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route("home")}}">Home</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link active" href="{{ route("contact.index")}}">Contacts</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
