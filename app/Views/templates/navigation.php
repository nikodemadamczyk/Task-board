
<nav class="navbar navbar-expand-lg custom-nav">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="navbar-brand">
            <a href="<?= base_url('/') ?>">
                <img src="<?= base_url('images/07_-_WE-Logo.svg') ?>" alt="WEB Entwicklung" height="80">
            </a>
        </div>

        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('tasks') ?>">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('tasks') ?>">Boards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('spalten') ?>">Spalten</a>
                </li>
            </ul>
        </div>
    </div>
</nav>