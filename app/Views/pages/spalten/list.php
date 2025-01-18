<div class="container custom-container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Spalten</h5>
            <a href="<?= base_url('spalten/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Erstellen
            </a>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

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
                        <?php if (!empty($spalten)): ?>
                            <?php foreach ($spalten as $spalte): ?>
                                <tr>
                                    <td><?= esc($spalte['spalten_id']) ?></td>
                                    <td><?= esc($spalte['board_name']) ?></td>
                                    <td><?= esc($spalte['sort_id']) ?></td>
                                    <td><?= esc($spalte['spalte']) ?></td>
                                    <td><?= esc($spalte['spaltenbeschreibung']) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('spalten/edit/' . $spalte['spalten_id']) ?>"
                                           class="btn btn-sm btn-info me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('spalten/delete/' . $spalte['spalten_id']) ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Sind Sie sicher, dass Sie diese Spalte löschen möchten?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Keine Spalten gefunden</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>