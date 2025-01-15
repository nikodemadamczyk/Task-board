<div class="container custom-container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Spalten</h5>
        </div>
        <div class="card-body">
            <button class="btn btn-primary mb-3">
                <a href="<?= base_url('form') ?>" class="btn btn-primary">Erstellen</a>
            </button>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Board</th>
                        <th>Sortid</th>
                        <th>Spalte</th>
                        <th>Spaltenbeschreibung</th>
                        <th>Bearbeiten</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Allgemeine Todos</td>
                        <td>100</td>
                        <td>Zu besprechen</td>
                        <td>Noch zu besprechende Todos</td>
                        <td>
                            <i class="fas fa-edit text-primary me-2"></i>
                            <i class="fas fa-trash-alt text-primary"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Allgemeine Todos</td>
                        <td>200</td>
                        <td>In Bearbeitung</td>
                        <td>Todos die aktuell bearbeitet werden</td>
                        <td>
                            <i class="fas fa-edit text-primary me-2"></i>
                            <i class="fas fa-trash-alt text-primary"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>