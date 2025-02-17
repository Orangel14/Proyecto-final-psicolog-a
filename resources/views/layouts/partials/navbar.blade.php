<div data-bs-theme="">
  <nav class="navbar navbar-vertical fixed-start navbar-expand-md " id="sidebar">
    <div class="container-md ">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
        aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/img/psicologia.svg') }}" class="navbar-brand-img mx-auto" alt="...">
      </a>
      <div class="collapse navbar-collapse" id="sidebarCollapse">
        <ul class="navbar-nav">

             <li class="nav-item dropdown" style="margin-bottom: 20px;">
              <a class="nav-link {{ request()->routeIs('psicologos.list') ? 'active' : '' }}" href="{{ route('psicologos.list') }}" style="text-align: center;">
              <i class="fa-solid fa-users fa-2xl text-shadow-pop-bottom" style="color: #BD8670"></i>
              <span class="text-shadow-pop-bottom" style="font-size: 1.5em; padding-left: 10px; color: #bb5826;">Lista de Psicologos</span>
              </a>
             </li>


             
             <li class="nav-item" style="margin-bottom: 15px;">
              <a class="nav-link {{ request()->routeIs('nosotros.index') ? 'active' : '' }}" href="{{ route('nosotros.index') }}">
                <i class="fa-solid fa-users fa-2xl text-shadow-pop-bottom" style="color: #BD8670"></i>
                <span class="text-shadow-pop-bottom" style="font-size: 1.5em; padding-left: 10px; color: #bb5826;">Nosotros</span>
              </a>
            </li>
            
            @if (Auth::user()->role == 'publicador')
             <li class="nav-item" style="margin-bottom: 15px;">
              <a class="nav-link {{ request()->routeIs('psicologos.index') ? 'active' : '' }} " href="{{ route('psicologos.index') }}">
                <i class="fa-sharp fa-solid fa-person-chalkboard fa-2xl text-shadow-pop-bottom" style="color: #BD8670"></i>
                <span class="text-shadow-pop-bottom" style="font-size: 1.5em; padding-left: 10px; color: #bb5826;">Informacion Profesional</span>
              </a>
            </li>
            @endif

            @if (Auth::user()->role == 'user')
            <li class="nav-item" style="margin-bottom: 15px;">
              <a class="nav-link {{ request()->routeIs('paciente.index') ? 'active' : '' }} " href="{{ route('paciente.index') }}">
                <i class="fa-sharp fa-solid fa-person-chalkboard fa-2xl text-shadow-pop-bottom" style="color: #BD8670;"></i>
                <span class="text-shadow-pop-bottom" style="font-size: 1.5em; padding-left: 10px; color: #bb5826;">Informacion Adicional</span>
              </a>
            </li>
            @endif

            <li class="nav-item" style="margin-bottom: 15px;">
              <a class="nav-link {{ request()->routeIs('contactanos.index') ? 'active' : '' }}" href="{{ route('contactanos.index') }}">
                <i class="fa-solid fa-phone-volume fa-2xl text-shadow-pop-bottom" style="color: #BD8670;"></i>
                <span class="text-shadow-pop-bottom" style="font-size: 1.5em; padding-left: 10px; color: #bb5826;">Contactanos</span>
              </a>
            </li>  
            
        </ul>
      </div>
    </div>
  </nav>
</div>
