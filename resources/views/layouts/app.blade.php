<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', config('app.name', 'Laravel'))</title>
 
  <!-- General CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  

</head>

<body>
  <div id="app">
   <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-sm main-navbar">  
        <div class="container-fluid">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li>
              <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                <i class="fas fa-bars"></i>
              </a>
            </li>
          </ul>
        </form>
        <div class="navbar-nav d-flex">
          <div class="dropdown">
            <a href="#" data-bs-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              @if (Auth::user()->profil->image)
               <img alt="image" src="{{ asset('storage/'. Auth::user()->profil->image) }}" class="rounded-circle mr-1 " style="width: 30px;height:30px">
              @else
              <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="border border-light rounded-circle pr-3" style="width: 30px;height:30px">
              @endif
              <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->profil->nama }}
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-2">
              <div class="dropdown-title">Setting Profil</div>
              <li>
                <a class="dropdown-item has-icon" href="{{ route('profil.index') }}">
                  <i class="bi bi-person-circle"></i> Profil
                </a>
              </li>
              <li>
                <a class="dropdown-item has-icon" href="#">
                  <i class="bi bi-shield-lock"></i> Ubah Sandi
                </a>
              </li>
              <li>
                <a class="dropdown-item has-icon" href="#">
                  <i class="bi bi-gear-fill"></i> Settings
                </a>
              </li>
              <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dropdown-item text-danger text-center">
                  @csrf
                  <div class="d-grid gap">
                  <button class="btn btn-sm btn-danger has-icon">
                    <i class="fas fa-sign-out-alt"></i> Logout</button>
                  </div>
              </form>
              </li>
            </ul>
          </div>
          
        </div>   
      </div>    
      </nav>

      @include('layouts.navigation')

      <!-- Main Content -->
      <div class="main-content" style="min-height: 549px;">   
        <div class="containesr">
          @yield('content')
        </div>   
      </div>

      <footer class="main-footer bg-white">
        <div class="footer-left">
          Copyright &copy; {{ now()->year }} <div class="bullet"></div> Design By 
          <a class="text-decoration-none" href="https://nauval.in/" target="_blank">
            Muhamad Nauval Azhar
          </a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

    <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 
  @stack('scripts')

</body>

</html>