<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <?= isset($spalte) ? 'Spalte bearbeiten' : 'Neue Spalte erstellen' ?>
            </h5>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= isset($spalte) ? base_url('spalten/update/' . $spalte['spalten_id']) : base_url('spalten/store') ?>"
                  method="post">
                <!-- Board ID -->
                <div class="row mb-3">
                    <label for="boards_id" class="col-sm-2 col-form-label">Board</label>
                    <div class="col-sm-10">
                        <select class="form-select <?= isset($validation) && $validation->hasError('boards_id') ? 'is-invalid' : '' ?>"
                                id="boards_id"
                                name="boards_id"
                                required>
                            <option value="">Bitte Team auswählen</option>
                            <?php for ($i = 1; $i <= 9; $i++): ?>
                                <option value="<?= $i ?>" <?= (isset($spalte) && $spalte['boards_id'] == $i) || old('boards_id') == (string)$i ? 'selected' : '' ?>>Team <?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <?php if (isset($validation) && $validation->hasError('boards_id')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('boards_id') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sort ID -->
                <div class="row mb-3">
                    <label for="sort_id" class="col-sm-2 col-form-label">Sort ID</label>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control <?= isset($validation) && $validation->hasError('sort_id') ? 'is-invalid' : '' ?>"
                               id="sort_id"
                               name="sort_id"
                               value="<?= isset($spalte) ? $spalte['sort_id'] : old('sort_id', '0') ?>"
                               required>
                        <?php if (isset($validation) && $validation->hasError('sort_id')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sort_id') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Spalte -->
                <div class="row mb-3">
                    <label for="spalte" class="col-sm-2 col-form-label">Spalte</label>
                    <div class="col-sm-10">
                        <select class="form-select <?= isset($validation) && $validation->hasError('spalte') ? 'is-invalid' : '' ?>"
                                id="spalte"
                                name="spalte"
                                required>
                            <option value="Zu Besprechende" <?= (isset($spalte) && $spalte['spalte'] == 'Zu Besprechende') || old('spalte') == 'Zu Besprechende' ? 'selected' : '' ?>>Zu Besprechende</option>
                            <option value="Offen" <?= (isset($spalte) && $spalte['spalte'] == 'Offen') || old('spalte') == 'Offen' ? 'selected' : '' ?>>Offen</option>
                            <option value="In Bearbeitung" <?= (isset($spalte) && $spalte['spalte'] == 'In Bearbeitung') || old('spalte') == 'In Bearbeitung' ? 'selected' : '' ?>>In Bearbeitung</option>
                            <option value="Erledigt" <?= (isset($spalte) && $spalte['spalte'] == 'Erledigt') || old('spalte') == 'Erledigt' ? 'selected' : '' ?>>Erledigt</option>
                        </select>
                        <?php if (isset($validation) && $validation->hasError('spalte')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('spalte') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Spaltenbeschreibung -->
                <div class="row mb-3">
                    <label for="spaltenbeschreibung" class="col-sm-2 col-form-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= isset($validation) && $validation->hasError('spaltenbeschreibung') ? 'is-invalid' : '' ?>"
                                  id="spaltenbeschreibung"
                                  name="spaltenbeschreibung"
                                  rows="3"><?= isset($spalte) ? $spalte['spaltenbeschreibung'] : old('spaltenbeschreibung') ?></textarea>
                        <?php if (isset($validation) && $validation->hasError('spaltenbeschreibung')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('spaltenbeschreibung') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save me-1"></i> Speichern
                        </button>
                        <a href="<?= base_url('spalten') ?>" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Abbrechen
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>