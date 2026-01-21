<h1 class="mb-4">Halls</h1>

<!-- Search Form -->
<?= $this->Form->create(null, ['type' => 'get', 'class' => 'mb-4']) ?>
<div class="row g-2">
    <div class="col-md-6">
        <?= $this->Form->control('search', [
            'label' => false,
            'placeholder' => 'Search by name or capacity',
            'value' => $this->request->getQuery('search'),
            'class' => 'form-control'
        ]) ?>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary w-100" type="submit">Search</button>
    </div>
</div>
<?= $this->Form->end() ?>

<!-- Table -->
<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>Name</th>
            <th>Capacity</th>
            <th>Min Booking Day</th>
            <th>Weekday Rate</th>
            <th>Weekend Rate</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($halls as $hall): ?>
        <tr>
            <td><?= h($hall->name) ?></td>
            <td><?= h($hall->capacity) ?> pax</td>
            <td><?= h($hall->min_booking_day) ?> day(s)</td>
            <td>RM <?= number_format($hall->weekday_rate, 2) ?></td>
            <td>RM <?= number_format($hall->weekend_rate, 2) ?></td>
            <td class="text-end">
                <?= $this->Html->link('View', ['action' => 'view', $hall->id], ['class' => 'btn btn-sm btn-outline-info me-2']) ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $hall->id], ['class' => 'btn btn-sm btn-outline-warning me-2']) ?>
                <?= $this->Form->postLink('Delete', ['action' => 'delete', $hall->id], [
                    'confirm' => 'Are you sure?',
                    'class' => 'btn btn-sm btn-outline-danger'
                ]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Add Hall Button -->
<br>
<div class="mb-4 text-end">
    <?= $this->Html->link('Add New Hall', ['action' => 'add'], ['class' => 'btn btn-success']) ?>
</div>