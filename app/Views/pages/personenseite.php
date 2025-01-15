<?php
/**
 * @var array $personen
 */
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Personen Liste</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Vorname</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($personen)): ?>
                    <?php foreach($personen as $person): ?>
                        <tr>
                            <td><?= $person['id'] ?? '' ?></td>
                            <td><?= $person['vorname'] ?? '' ?></td>
                            <td><?= $person['name'] ?? '' ?></td>
                            <td><?= $person['email'] ?? '' ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Keine Daten verfügbar</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>