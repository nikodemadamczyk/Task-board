<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <h2>Tasks</h2>
            <a href="<?= base_url('tasks/create') ?>" class="btn btn-primary ms-3">
                <i class="fas fa-plus me-2"></i>Neu
            </a>
        </div>
        <div class="d-flex gap-2">
            <div class="search-container">
                <input type="text" class="form-control" placeholder="Suchen" id="taskSearch">
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="boardDropdown" data-bs-toggle="dropdown">
                    Home Todos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item active" href="#">Home Todos</a></li>
                    <?php if(isset($boards)): foreach($boards as $board): ?>
                        <li><a class="dropdown-item" href="<?= base_url('tasks/board/' . $board['id']) ?>"><?= esc($board['name']) ?></a></li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <?php if (isset($tasksByColumn)): ?>
        <?php foreach ($tasksByColumn as $boardId => $columns): ?>
            <div class="row flex-nowrap overflow-auto">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Zu Besprechende</h5>
                            <small class="text-muted">Noch zu besprechende Todos.</small>
                        </div>
                        <div class="card-body">
                            <?php if (isset($columns['Zu Besprechende'])): ?>
                                <?php foreach ($columns['Zu Besprechende'] as $task): ?>
                                    <div class="card mb-2 task-card">
                                        <div class="card-body p-2">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                        <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                    </div>
                                                    <p class="card-text mt-1 mb-0">
                                                        <small class="text-muted">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            <?= date('d.m.y', strtotime($task['erstelldatum'])) ?>
                                                            <?php if ($task['erinnerungsdatum']): ?>
                                                                <i class="fas fa-bell ms-2 me-1"></i>
                                                                <?= date('d.m.y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                            <?php endif; ?>
                                                        </small>
                                                    </p>
                                                    <div class="mt-2">
                                                        <span class="badge rounded-circle bg-primary">
                                                            <?= strtoupper(substr($task['vorname'], 0, 1) . substr($task['name'], 0, 1)) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <?php if ($task['erledigt'] == 0): ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markComplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-check me-2"></i>Als erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php else: ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markIncomplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-undo me-2"></i>Als nicht erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php endif; ?>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/copy/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-copy me-2"></i>Task kopieren
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-edit me-2"></i>Task bearbeiten
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                               onclick="return confirm('Bist du sicher?');">
                                                                <i class="fas fa-trash me-2"></i>Task löschen
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <button class="btn btn-primary w-100 mt-3" onclick="window.location.href='<?= base_url('tasks/create') ?>'">
                                <i class="fas fa-plus me-2"></i>Neu
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Offen Column -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Offen</h5>
                            <small class="text-muted">Offene Todos.</small>
                        </div>
                        <div class="card-body">
                            <?php if (isset($columns['Offen'])): ?>
                                <?php foreach ($columns['Offen'] as $task): ?>
                                    <div class="card mb-2 task-card">
                                        <div class="card-body p-2">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                        <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                    </div>
                                                    <p class="card-text mt-1 mb-0">
                                                        <small class="text-muted">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            <?= date('d.m.y', strtotime($task['erstelldatum'])) ?>
                                                            <?php if ($task['erinnerungsdatum']): ?>
                                                                <i class="fas fa-bell ms-2 me-1"></i>
                                                                <?= date('d.m.y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                            <?php endif; ?>
                                                        </small>
                                                    </p>
                                                    <div class="mt-2">
                                                        <span class="badge rounded-circle bg-primary">
                                                            <?= strtoupper(substr($task['vorname'], 0, 1) . substr($task['name'], 0, 1)) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <?php if ($task['erledigt'] == 0): ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markComplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-check me-2"></i>Als erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php else: ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markIncomplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-undo me-2"></i>Als nicht erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php endif; ?>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/copy/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-copy me-2"></i>Task kopieren
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-edit me-2"></i>Task bearbeiten
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                               onclick="return confirm('Bist du sicher?');">
                                                                <i class="fas fa-trash me-2"></i>Task löschen
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <button class="btn btn-primary w-100 mt-3" onclick="window.location.href='<?= base_url('tasks/create') ?>'">
                                <i class="fas fa-plus me-2"></i>Neu
                            </button>
                        </div>
                    </div>
                </div>

                <!-- In Bearbeitung Column -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">In Bearbeitung</h5>
                            <small class="text-muted">Todos die aktuell bearbeitet werden.</small>
                        </div>
                        <div class="card-body">
                            <?php if (isset($columns['In Bearbeitung'])): ?>
                                <?php foreach ($columns['In Bearbeitung'] as $task): ?>
                                    <div class="card mb-2 task-card">
                                        <div class="card-body p-2">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                        <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                    </div>
                                                    <p class="card-text mt-1 mb-0">
                                                        <small class="text-muted">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            <?= date('d.m.y', strtotime($task['erstelldatum'])) ?>
                                                            <?php if ($task['erinnerungsdatum']): ?>
                                                                <i class="fas fa-bell ms-2 me-1"></i>
                                                                <?= date('d.m.y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                            <?php endif; ?>
                                                        </small>
                                                    </p>
                                                    <div class="mt-2">
                                                        <span class="badge rounded-circle bg-primary">
                                                            <?= strtoupper(substr($task['vorname'], 0, 1) . substr($task['name'], 0, 1)) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <?php if ($task['erledigt'] == 0): ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markComplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-check me-2"></i>Als erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php else: ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markIncomplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-undo me-2"></i>Als nicht erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php endif; ?>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/copy/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-copy me-2"></i>Task kopieren
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-edit me-2"></i>Task bearbeiten
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                               onclick="return confirm('Bist du sicher?');">
                                                                <i class="fas fa-trash me-2"></i>Task löschen
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <button class="btn btn-primary w-100 mt-3" onclick="window.location.href='<?= base_url('tasks/create') ?>'">
                                <i class="fas fa-plus me-2"></i>Neu
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Erledigt</h5>
                            <small class="text-muted">Todos die erledigt sind.</small>
                        </div>
                        <div class="card-body">
                            <?php if (isset($columns['Erledigt'])): ?>
                                <?php foreach ($columns['Erledigt'] as $task): ?>
                                    <div class="card mb-2 task-card">
                                        <div class="card-body p-2">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa <?= esc($task['taskartenicon']) ?> me-2"></i>
                                                        <h6 class="mb-0"><?= esc($task['tasks']) ?></h6>
                                                    </div>
                                                    <p class="card-text mt-1 mb-0">
                                                        <small class="text-muted">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            <?= date('d.m.y', strtotime($task['erstelldatum'])) ?>
                                                            <?php if ($task['erinnerungsdatum']): ?>
                                                                <i class="fas fa-bell ms-2 me-1"></i>
                                                                <?= date('d.m.y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                            <?php endif; ?>
                                                        </small>
                                                    </p>
                                                    <div class="mt-2">
                                                        <span class="badge rounded-circle bg-primary">
                                                            <?= strtoupper(substr($task['vorname'], 0, 1) . substr($task['name'], 0, 1)) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-link text-dark p-0" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <?php if ($task['erledigt'] == 0): ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markComplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-check me-2"></i>Als erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php else: ?>
                                                            <li>
                                                                <form action="<?= base_url('tasks/markIncomplete/' . $task['tasks_id']) ?>" method="post">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="fas fa-undo me-2"></i>Als nicht erledigt markieren
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php endif; ?>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/copy/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-copy me-2"></i>Task kopieren
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/edit/' . $task['tasks_id']) ?>">
                                                                <i class="fas fa-edit me-2"></i>Task bearbeiten
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="<?= base_url('tasks/delete/' . $task['tasks_id']) ?>"
                                                               onclick="return confirm('Bist du sicher?');">
                                                                <i class="fas fa-trash me-2"></i>Task löschen
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <button class="btn btn-primary w-100 mt-3" onclick="window.location.href='<?= base_url('tasks/create') ?>'">
                                <i class="fas fa-plus me-2"></i>Neu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<style>
    /* Additional styles for the Kanban board */
    .task-card {
        transition: all 0.2s ease;
    }


    .card-header {
        background-color: white !important;
    }

    .badge.rounded-circle {
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .search-container {
        min-width: 200px;
    }

    @media (max-width: 768px) {
        .row.flex-nowrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .col-md-3 {
            min-width: 300px;
        }
    }
    .card{
        margin-bottom: 1rem;
    }
</style>

<script>
    // Search functionality
    document.getElementById('taskSearch').addEventListener('input', function(e) {
        const searchText = e.target.value.toLowerCase();
        document.querySelectorAll('.task-card').forEach(card => {
            const taskText = card.textContent.toLowerCase();
            card.style.display = taskText.includes(searchText) ? '' : 'none';
        });
    });
</script>