<h1>Package Detail</h1>

<table class="table table-bordered">
    <tr><th>Name</th><td><?= h($package->name) ?></td></tr>
    <tr><th>Price</th><td>RM <?= number_format($package->price, 2) ?></td></tr>
    <tr><th>Includes</th><td><?= nl2br(h($package->includes)) ?></td></tr>
</table>

<div class="mt-3">
    <?= $this->Html->link('Edit', ['action' => 'edit', $package->id], ['class' => 'btn btn-warning me-2']) ?>
    <?= $this->Form->postLink('Delete', ['action' => 'delete', $package->id], [
        'confirm' => 'Are you sure?',
        'class' => 'btn btn-danger me-2'
    ]) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>

