<div class="container custom-container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0"><?= isset($task) ? 'Task bearbeiten' : 'Task erstellen' ?></h5>
        </div>
        <div class="card-body">
            <form action="<?= isset($task) ? base_url('tasks/update/' . $task['tasks_id']) : base_url('Tasks/store') ?>" method="post">
                <!-- Task-Bezeichnung -->
                <div class="row mb-3">
                    <label for="tasks" class="col-sm-2 col-form-label">Task-Bezeichnung</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="tasks"
                               name="tasks"
                               value="<?= isset($task) ? esc($task['tasks']) : old('tasks') ?>"
                               required>
                    </div>
                </div>

                <!-- Person ID -->
                <div class="row mb-3">
                    <label for="personen_id" class="col-sm-2 col-form-label">Person ID</label>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control"
                               id="personen_id"
                               name="personen_id"
                               value="<?= isset($task) ? esc($task['personen_id']) : old('personen_id', '1') ?>"
                               required
                               min="1">
                    </div>
                </div>

                <!-- Taskart ID -->
                <div class="row mb-3">
                    <label for="taskarten_id" class="col-sm-2 col-form-label">Taskart ID</label>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control"
                               id="taskarten_id"
                               name="taskarten_id"
                               value="<?= isset($task) ? esc($task['taskarten_id']) : old('taskarten_id', '1') ?>"
                               required>
                    </div>
                </div>

                <!-- Spalte ID -->
                <div class="row mb-3">
                    <label for="spalten_id" class="col-sm-2 col-form-label">Spalte ID</label>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control"
                               id="spalten_id"
                               name="spalten_id"
                               value="<?= isset($task) ? esc($task['spalten_id']) : old('spalten_id', '1') ?>"
                               required>
                    </div>
                </div>

                <!-- Erinnerungsdatum -->
                <div class="row mb-3">
                    <label for="erinnerungsdatum" class="col-sm-2 col-form-label">Erinnerungsdatum</label>
                    <div class="col-sm-10">
                        <input type="datetime-local"
                               class="form-control"
                               id="erinnerungsdatum"
                               name="erinnerungsdatum"
                               value="<?= isset($task) && $task['erinnerungsdatum']
                                   ? date('Y-m-d\TH:i', strtotime($task['erinnerungsdatum']))
                                   : (old('erinnerungsdatum') ?: date('Y-m-d\TH:i')) ?>">
                    </div>
                </div>

                <!-- Erinnerung -->
                <div class="row mb-3">
                    <label for="erinnerung" class="col-sm-2 col-form-label">Erinnerung</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="erinnerung" name="erinnerung">
                            <option value="0" <?= (isset($task) && $task['erinnerung'] == 0) || old('erinnerung') == '0' ? 'selected' : '' ?>>Nein</option>
                            <option value="1" <?= (isset($task) && $task['erinnerung'] == 1) || old('erinnerung') == '1' ? 'selected' : '' ?>>Ja</option>
                        </select>
                    </div>
                </div>

                <!-- Notiz -->
                <div class="row mb-3">
                    <label for="notizen" class="col-sm-2 col-form-label">Notiz</label>
                    <div class="col-sm-10">
                        <textarea class="form-control"
                                  id="notizen"
                                  name="notizen"
                                  rows="3"><?= isset($task) ? esc($task['notizen']) : old('notizen') ?></textarea>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success me-2">
                            <i class="fas fa-save me-1"></i>
                            Speichern
                        </button>
                        <a href="<?= base_url('tasks') ?>" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i>
                            Abbrechen
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>