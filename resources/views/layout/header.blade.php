<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="light">

        <a href="../index.html" class="logo">
            <img src="../../assets/img/logo_keynetiks.png" width="150px" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="light">
        <div class="container-fluid">
            <div class="collapse" id="search-nav">

            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">


                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle row profile-pic d-flex justify-content-center align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="col-md">
                            <h5 class="col-md" style=" font-weight:900; font-size:15px;">{{ $userName }}</h5>
                        </div>
                        <div class="avatar-sm ">
                            <img src="../../assets/img/user.png" alt="..." width="60px" height="auto" class="avatar-img rounded-circle">
                       </div>
                    </a>

                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <li>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
