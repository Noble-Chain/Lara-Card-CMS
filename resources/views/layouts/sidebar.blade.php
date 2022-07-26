<div class="col-lg-2 sidebar-bg">
    <div class="p-5 text-light">
        <p class="text-white-50 mb-2 small text-uppercase side-bar-menu">Dashboard ></p>

        <div class="">
            <a class="d-flex align-items-center text-decoration-none text-white-50 sidebar-active" href="{{ route('card.index') }}">
                <i class="bi bi-card-text m-2"></i>
                <p class="mb-0 l side-bar-menu">Cards</p>
            </a>
        </div>
        <div class="">
            <a class="d-flex align-items-center text-decoration-none text-white-50 disabled-link  " href="#">
                <i class="bi bi-bell-fill m-2 text-muted"></i>
                <p class="mb-0 l side-bar-menu text-muted">Notification</p>
            </a>
        </div>
        <div class="mb-4">
            <a class="d-flex align-items-center text-decoration-none text-white-50 disabled-link" href="#">
                <i class="bi bi-file-earmark-text m-2 text-muted"></i>
                <p class="mb-0 l side-bar-menu text-muted">Report</p>
            </a>
        </div>

        <p class="text-white-50 mb-2 small text-uppercase side-bar-menu">Setting</p>

        <div class="">
            <a class="d-flex align-items-center text-decoration-none text-white-50" href="{{ route('user.index') }}">
                <i class="bi bi-person m-2"></i>
                <p class="mb-0 l side-bar-menu">Users</p>
            </a>
        </div>

    </div>
</div>
