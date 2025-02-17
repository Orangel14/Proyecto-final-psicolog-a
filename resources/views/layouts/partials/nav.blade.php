<nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
    <div class="container-fluid">
        <div class="ms-auto navbar-user">            
            <div class="dropdown">
                <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/img/psicologia.svg') }}" alt="" class="avatar-img rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item mb-3 text-shadow-pop-bottom " type="submit">Cerrar sección</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
