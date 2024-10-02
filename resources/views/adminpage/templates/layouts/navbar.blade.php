<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="menu-navbar container-fluid d-flex align-items-center">
        <button class="navbar-toggler" type="button" id="sidebarToggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </a>
        <div class="header-right ms-auto d-flex align-items-center">
            <div class="me-3 text-end">
                <span class="greeting d-block">Hallo Admin,</span>
                <span class="username">Aden S. Putra</span>
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center justify-content-center text-decoration-none" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px;"></div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-dashbord" aria-labelledby="dropdownUser">
                    <li>
                        <a class="dropdown-item text-center" href="#">
                            <div class="d-flex justify-content-center">
                                <div class="rounded-circle bg-secondary" style="width: 60px; height: 60px;"></div>
                            </div>
                            <h5 class="logout-username">Aden S. Putra</h5>
                            <p class="logout-email">Aden@gmail.com</p>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="dropdown-item logout-img text-center" href="#" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="{{ asset('assets/img/logout.png') }}" alt="">
                            </a>
                        </form>
                    </li>                    
                </ul>
            </div>
        </div>
    </div>
</nav>