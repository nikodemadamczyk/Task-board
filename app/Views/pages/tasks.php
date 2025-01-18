<div class="container-fluid mt-4">
    <?php if (isset($tasksByColumn)): ?>
        <?php foreach ($tasksByColumn as $boardId => $columns): ?>
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                    <h2>Team <?= $boardId ?></h2>
                    <a href="<?= base_url('tasks/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Neu
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Zu Besprechende</h5>
                                <small class="text-muted">Noch zu besprechende Todos.</small>
                            </div>
                            <div class="card-body">
                                <?php if (isset($columns['Zu Besprechende'])): ?>
                                    <?php foreach ($columns['Zu Besprechende'] as $task): ?>
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                            <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                        </div>
                                                        <p class="card-text mt-2 mb-0">
                                                            <small class="text-muted">
                                                                <i class="fas fa-user me-1"></i>
                                                                <?= esc($task['vorname']) ?> <?= esc($task['name']) ?>
                                                            </small>
                                                        </p>
                                                        <?php if (isset($task['erinnerungsdatum']) && $task['erinnerungsdatum']): ?>
                                                            <p class="card-text mb-0">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-clock me-1"></i>
                                                                    <?= date('d.m.Y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                                </small>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <a href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-danger btn-sm"
                                                           onclick="return confirm('Bist du sicher?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Offen</h5>
                                <small class="text-muted">Offene Todos.</small>
                            </div>
                            <div class="card-body">
                                <?php if (isset($columns['Offen'])): ?>
                                    <?php foreach ($columns['Offen'] as $task): ?>
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                            <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                        </div>
                                                        <p class="card-text mt-2 mb-0">
                                                            <small class="text-muted">
                                                                <i class="fas fa-user me-1"></i>
                                                                <?= esc($task['vorname']) ?> <?= esc($task['name']) ?>
                                                            </small>
                                                        </p>
                                                        <?php if (isset($task['erinnerungsdatum']) && $task['erinnerungsdatum']): ?>
                                                            <p class="card-text mb-0">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-clock me-1"></i>
                                                                    <?= date('d.m.Y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                                </small>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <a href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-danger btn-sm"
                                                           onclick="return confirm('Bist du sicher?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">In Bearbeitung</h5>
                                <small class="text-muted">Todos die aktuell bearbeitet werden.</small>
                            </div>
                            <div class="card-body">
                                <?php if (isset($columns['In Bearbeitung'])): ?>
                                    <?php foreach ($columns['In Bearbeitung'] as $task): ?>
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                            <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                        </div>
                                                        <p class="card-text mt-2 mb-0">
                                                            <small class="text-muted">
                                                                <i class="fas fa-user me-1"></i>
                                                                <?= esc($task['vorname']) ?> <?= esc($task['name']) ?>
                                                            </small>
                                                        </p>
                                                        <?php if (isset($task['erinnerungsdatum']) && $task['erinnerungsdatum']): ?>
                                                            <p class="card-text mb-0">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-clock me-1"></i>
                                                                    <?= date('d.m.Y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                                </small>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <a href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-danger btn-sm"
                                                           onclick="return confirm('Bist du sicher?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Erledigt</h5>
                                <small class="text-muted">Todos die erledigt sind.</small>
                            </div>
                            <div class="card-body">
                                <?php if (isset($columns['Erledigt'])): ?>
                                    <?php foreach ($columns['Erledigt'] as $task): ?>
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                            <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                        </div>
                                                        <p class="card-text mt-2 mb-0">
                                                            <small class="text-muted">
                                                                <i class="fas fa-user me-1"></i>
                                                                <?= esc($task['vorname']) ?> <?= esc($task['name']) ?>
                                                            </small>
                                                        </p>
                                                        <?php if (isset($task['erinnerungsdatum']) && $task['erinnerungsdatum']): ?>
                                                            <p class="card-text mb-0">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-clock me-1"></i>
                                                                    <?= date('d.m.Y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                                </small>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <a href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                           class="btn btn-outline-danger btn-sm"
                                                           onclick="return confirm('Bist du sicher?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>