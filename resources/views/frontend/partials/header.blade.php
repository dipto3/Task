
  <!--start top header-->
  <header class="top-header">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
      <a class="navbar-brand d-none d-xl-inline" href="index.html"><img src="frontend/assets/images/logo.webp" class="logo-img" alt=""></a>
      <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        <i class="bi bi-list"></i>
      </a>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
          <div class="offcanvas-logo"><img src="frontend/assets/images/logo.webp" class="logo-img" alt="">
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body primary-menu">
          <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
           
            @if (Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" style="color: rgb(197, 30, 30)" href="javascript:;" data-bs-toggle="dropdown">
              <b> {{ Auth::user()->name }}</b> 
              </a>
              <ul class="dropdown-menu">
              
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                 

                  <li><a class="dropdown-item" href="route('logout')"
                          onclick="event.preventDefault();
this.closest('form').submit();">Logout</a>
                  </li>
              </form>
               
              
              </ul>
            </li>
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                Account
              </a>
              <ul class="dropdown-menu">
              
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
              
              </ul>
            </li>
            @endif
         
          </ul>
        </div>
      </div>
      
    </nav>
  </header>
  <!--end top header-->