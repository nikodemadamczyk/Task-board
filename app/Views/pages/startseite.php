<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php for($i = 1; $i <= 8; $i++): ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <!-- Ikona zespołu -->
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <!-- Nazwa zespołu -->
                        <h5 class="card-title">Team <?= $i ?></h5>
                        <!-- Link -->
                        <a href="#" class="text-decoration-none">Link zum Webspace.</a>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>