<header id="header" class="header sticky-top">
    <div class="container d-flex align-items-center justify-content-between">

    <div class="logo d-flex align-items-center" style="flex: 1;">
      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">ADR Online Library</h1>
      </a>
    </div>

      <div class="nav-area text-center" style="flex: 1;">
      <nav id="navmenu" class="navmenu">
        <ul class="d-flex justify-content-center gap-4 list-unstyled m-0">
          <li><a href="/">Home</a></li>
          <li><a href="/genre">Genres</a></li>
          <li><a href="/books">Books</a></li>
          @auth
          <li><a href="/profile">Profile</a></li>
          @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      </div>
      
      @guest
      <div class="auth-area d-flex justify-content-end align-items-center" style="flex: 1;">
        <a href="/login" class="btn btn-dark me-2">Login</a>
        <a href="/register" class="btn btn-dark">Register</a>
      </div>
      @endguest
      @auth
      <form action="/logout" method="POST">
      @csrf
      <button class="btn btn-danger">Logout</button>
      </form>
      
      @endauth

     
    </div>
  </header>