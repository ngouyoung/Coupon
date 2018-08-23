<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="couponsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-ticket-alt"></i>
            <span>Coupons</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="couponsDropdown">
            <a class="dropdown-item" href="#">All Coupon</a>
            <a class="dropdown-item" href="#">Add New</a>
            <a class="dropdown-item" href="{{ url('admin/categories') }}">Categories</a>
            <a class="dropdown-item" href="{{ url('admin/store') }}">Stores</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="#">Login</a>
            <a class="dropdown-item" href="#">Register</a>
            <a class="dropdown-item" href="#">Forgot Password</a>
        </div>
    </li>
</ul>