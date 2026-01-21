<h1 class="mb-4">Packages</h1>

<!-- Search Form -->
<?= $this->Form->create(null, ['type' => 'get', 'class' => 'mb-3']) ?>
<div class="row g-2">
    <div class="col-md-6">
        <?= $this->Form->control('search', [
            'label' => false,
            'placeholder' => 'Search by name or includes',
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
<table class="table table-bordered table-striped mt-4">
    <thead class="table-light">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Includes</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($packages as $package): ?>
        <tr>
            <td><?= h($package->name) ?></td>
            <td>RM <?= number_format($package->price, 2) ?></td>
            <td><?= nl2br(h($package->includes)) ?></td>
            <td class="text-end">
                <?= $this->Html->link('View', ['action' => 'view', $package->id], ['class' => 'btn btn-sm btn-outline-info me-2']) ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $package->id], ['class' => 'btn btn-sm btn-outline-warning me-2']) ?>
                <?= $this->Form->postLink('Delete', ['action' => 'delete', $package->id], [
                    'confirm' => 'Are you sure?',
                    'class' => 'btn btn-sm btn-outline-danger'
                ]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Add Package Button -->
<br>
<div class="mb-4 text-end">
    <?= $this->Html->link('Add New Package', ['action' => 'add'], ['class' => 'btn btn-success']) ?>
</div>
