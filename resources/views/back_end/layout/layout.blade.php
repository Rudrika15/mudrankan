<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
    integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>


  <style>
    /* CSS */


    .sidebar {
      height: 100vh;
      width: 250px;
      position: absolute;
      left: 0;
      top: 0;
      padding-top: 40px;
      box-shadow: 0 14px 28px rgb(0 0 0 / 25%), 0 10px 10px rgb(0 0 0 / 22%);
      background-color: rgba(0, 0, 0, .03);
    }

    .sidebar div {
      padding: 8px;
      padding-left: 20px;
      font-size: 20px;
      display: block;
    }

    .body-text {
      margin-left: 250px;
      font-size: 18px;
    }

    .sidebar a {
      color: gray;
      text-decoration: none;
    }
  </style>

  <!-- HTML -->

  <!-- navigation bar -->

  <nav class="navbar navbar-expand-lg bg-light  " style="border-bottom:1px solid rgba(0,0,0,.08)">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>

    <div class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">

      @auth
      <!-- {{auth()->user()->getRoleNames()}} -->
      <div class="text-end me-5">
        <ul class="navbar-nav me-5">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              {{auth()->user()->firstName}}<i class="bi bi-person-circle ms-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item " href="{{ route('logout') }}" class="btn btn-outline-dark me-2"> Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      @endauth
      @guest
      <div class="text-end">
        <!-- <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a> -->
        <a href="{{ route('login.perform') }}" class="btn btn-warning me-2">Login</a>
      </div>
      @endguest

    </div>
    </div>
  </nav>

  <!-- end navigation -->

  <!-- sidebar -->
  <div class="sidebar bg-light">
    <div class="border border-4" style="font-weight: 500; color: gray; font-size: 180%;"><i class="bi bi-cart4"></i>
      E-Commerce</div>
    <div><a href="{{route('home.index')}}"><i class="bi bi-house-fill"></i> {{__('Home')}}</a></div>
    <div><a href="{{route('field.show')}}"><i class="bi bi-list-task"></i> {{__('Field')}}</a></div>
    <div><a href="{{route('market.show')}}"><i class="bi bi-basket-fill"></i> {{__('Market')}}</a></div>
    <div><a href="{{route('channel.show')}}"><i class="bi bi-router-fill"></i> {{__('Channel')}}</a></div>
    <div><a href="{{route('category.show',app()->getLocale())}}"><i class="bi bi-folder-fill"></i>
        {{__('Category')}}</a></div>
    <div><a href="{{route('product.show')}}"><i class="bi bi-archive-fill"></i> {{__('Products')}}</a></div>

    <div><a href="{{route('option.show')}}"><i class="bi bi-plus-square"></i> {{__('Option')}}</a></div>
    <div><a href="{{route('optiongroup.show')}}"> <i class="bi bi-plus-square-fill"></i> {{__('Option Group')}}</a>
    </div>
    <div><a href="{{route('coupon.show')}}"><i class="bi bi-ticket-detailed"></i> {{__('Coupon')}}</a></div>
    <div> <a href="{{route('voucharmaster.show')}}"><i class="bi bi-ticket-detailed-fill"></i> {{__('Vouchar')}}</a>
    </div>

    @auth
    @role("Admin")
    <div class="text-start me-5">
      <ul class="navbar-nav me-5">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-gear-fill"></i> Setting
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div><a href="{{ route('users.index') }}"><i class="bi bi-people-fill"></i> Users</a></div>
            <div><a href="{{ route('roles.index') }}"><i class="bi bi-person-check-fill"></i> Roles</a></div>
            <div><a href="{{ route('permissions.index') }}"><i class="bi bi-incognito"></i> Permissions</a></div>
            @endrole
            <div><a href="{{route('slide.show')}}"><i class="bi bi-magic"></i> {{__('Slide')}}</a></div>
            <div><a href="{{route('currency.show')}}"><i class="bi bi-coin"></i> {{__('Currency')}}</a></div>
          </ul>
        </li>
      </ul>
    </div>
    @endauth

  </div>

  <!-- end sidebar -->



  <div class="body-text">
    <!-- body content -->
    @yield('body')
  </div>





  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#myDataTable").DataTable();
    });
  </script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>