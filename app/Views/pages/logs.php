<!-- app/Views/pages/logs.php -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">System Logs</h5>
        </div>
        <div class="card-body">
            <div class="bg-dark text-light p-3" style="white-space: pre-wrap; font-family: monospace;">
                <?= esc($logs) ?>
            </div>
        </div>
    </div>
</div>