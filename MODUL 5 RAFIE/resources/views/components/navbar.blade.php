<nav class="navbar navbar-expand navbar-dark" style="background-color: {{ $setelNavbar }}">
  <div class="container py-2">
    @guest
      <div class="navbar-nav d-flex justify-content-between w-100">
        <a class="nav-link active" href="/">Home</a>
        <a class="nav-link" href="/login">Login</a>
      </div>
    @else
      <div class="navbar-nav">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
        <a class="nav-link {{ Request::is('showroom/*') || Request::is('showroom') ? 'active' : '' }}" href="/showroom">MyCar</a>
      </div>
      <div class="d-flex">
        <a href="/showroom/create" class="btn btn-light" style="color: {{ $setelNavbar }}">Add Car</a>
        <div class="dropdown ms-4">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: {{ $setelNavbar }}"">
          {{ auth()->user()->name }}</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/profile" style="color: {{ $setelNavbar }}"">Profile</a></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item" style="color: {{ $setelNavbar }}"">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    @endguest
  </div>
</nav>