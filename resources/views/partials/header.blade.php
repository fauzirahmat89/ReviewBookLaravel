  

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Company</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu d-flex gap-4">
        <ul>
          <li><a href="./">Home</a></li>
          <li><a href="/genre">genre</a></li>
          <li><a href="/books">buku</a></li>
          @auth
            <li><a href="/profile">profile</a></li>              
          @endauth
          @guest
          <li>
              <a style="padding-right: 10px; margin-right:10px" href="/login" class="btn btn-primary">Login</a>
          </li>
          <li>
              <a style="padding-right: 10px" href="/register" class="btn btn-info">Register</a>
          </li>
          @endguest
          @auth
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">Logout</button>
              </form>
            </li>
          @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>