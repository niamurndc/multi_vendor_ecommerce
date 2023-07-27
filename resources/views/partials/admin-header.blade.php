<header class="header header-sticky mb-4">
  <div class="container-fluid">
    <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
      <i class="fa fa-bars"></i>
    </button>
    <a class="header-brand d-md-none" href="#">
      <svg width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#full"></use>
      </svg>
    </a>
    <ul class="header-nav d-none d-md-flex">
      <li class="nav-item"><a class="nav-link" href="/">View Site</a></li>
    </ul>
    <ul class="header-nav ms-auto">

    </ul>
    <ul class="header-nav ms-3">
      <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        {{auth()->user()->name}}
        <div class="avatar avatar-md"><img class="avatar-img" src="/image/profile.png" alt="admin"></div>

        <div class="dropdown-menu dropdown-menu-end pt-0">


          <a class="dropdown-item" href="/admin/profile">
            <i class="fa fa-user"></i> Profile
          </a>
          <a class="dropdown-item" href="/admin/settings">
            <i class="fa fa-cog"></i> Settings
          </a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</header>