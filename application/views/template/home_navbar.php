<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('user'); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/create'); ?>">Create User</a>
            </li>
        </ul>
    </div>
    <div class="justify-content-end" id="navbarNav">

        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>