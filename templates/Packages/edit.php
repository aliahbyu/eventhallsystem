<h1>Edit Package</h1>

<?= $this->Form->create($package) ?>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('price') ?>
    <?= $this->Form->control('includes', ['type' => 'textarea']) ?>
    <?= $this->Form->button('Update', ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>
