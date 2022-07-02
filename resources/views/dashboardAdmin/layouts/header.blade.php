<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="/dashboard-admin">Stay<span>cation.</span></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="/assets/images/avatar/2.jpg" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <ul><li>Erlangga</li></ul>
                    <form action="/dashboard-admin/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link dropdown-item"><i class="fa fa-power -off"></i>Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>