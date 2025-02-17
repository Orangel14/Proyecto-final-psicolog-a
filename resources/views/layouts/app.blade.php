<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Encuentra el bienestar mental que mereces desde la comodidad de tu hogar.">
  <link rel="shortcut icon" href="{{ asset('assets/img/psicologianuevoaqui.png') }}" type="image/png">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/custom-theme.css') }}">
  <title>{{ config('app.name') }}</title>
  @stack('styles')
</head>

<body class="@stack('class-body')">
  @stack('modals')
    @auth
      @if (auth()->user()->email_verified_at != null)
        <header>    
          @include('layouts.partials.navbar')
        </header>
      @endif
    @endauth

<div class="main-content">
    @auth
      @if (auth()->user()->email_verified_at != null)
        @include('layouts.partials.nav')
      @endif
    @endauth

    @yield('content')
    <ul id="messages"></ul>
</div>

  @include('layouts.partials.scripts')
  @stack('scripts')
  @if (count($errors) > 0)
    <script type="module">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
              setTimeout(() => toastr.error('{{ $error }}'), 300);
            @endforeach
        @endif
    </script>
  @endif
  @auth
    <form method="POST" action="{{ route('logout') }}" style="display:none" id="logout-form">
        @csrf
        <button type="submit" class="btn btn-link">Cerrar Sesión</button>
    </form>
  @endauth
</body>

</html>