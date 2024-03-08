<style>
.imaged {
    height: 90px;
    width: 90px;
    border: 3px solid;
    border-color: transparent;
    border-color: rgba(255, 255, 255, 0.2);
}
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="{{asset('/')}}" role="button">
                Back To Website
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ getProfileLogo()}}" style="width: 30px;" class="user-image"
                    alt="User Image" />
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div style="text-align: center;background-color: #3c8dbc;padding: 10px;">
                    <a href="{{route('profile')}}"> <img src="{{ getProfileLogo()}}" class="img-circle imaged" alt="User Image"></a>
                   
                    <p style="color:#fff">
                        Admin<br>
                        <small>MVT pvt ltd</small>
                    </p>
                </div>

                <div class="dropdown-divider"></div>
                <div class="text-center">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="btn">Sign out</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="{{route('profile')}}" class="brand-link">
        <img src="{{ getProfileLogo()}}" alt="MTV Logo" class="brand-image  ">
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="blog-categories-list" class="nav-link">
                        <i class="nav-icon fa fa-binoculars"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('blog-list') }}" class="nav-link">
                        <i class="nav-icon fa fa-cube"></i>
                        <p>
                            Blogs
                        </p>
                    </a>
                </li>
              <!--   <li class="nav-item">
                    <a href="{{url('admin/home-players')}}" class="nav-link">
                        <i class="nav-icon fa fa-users "></i>
                        <p>
                            Home Players
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{url('admin/players')}}" class="nav-link">
                        <i class="nav-icon fa fa-users "></i>
                        <p>
                            Players
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/teams')}}" class="nav-link">
                        <i class="nav-icon fa fa-gamepad "></i>
                        <p>
                            Teams
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contactlist" class="nav-link">
                        <i class="nav-icon fa fa-briefcase"></i>
                        <p>
                            Contact
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="feedback-list" class="nav-link">
                        <i class="nav-icon fa fa-comments" aria-hidden="true"></i>
                        <p>
                            Feedbacks
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="faqs-list" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>FAQS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="aboutus-list" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>About Us</p>
                    </a>
                </li>
                    <li class="nav-item">
                    <a href="{{route('logs')}}" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>Logs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('subscription')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Subscription</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>