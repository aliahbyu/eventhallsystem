<h1 class="mb-4">Add New Package</h1>

<?= $this->Form->create($package, ['class' => 'mb-3']) ?>
    <div class="mb-3">
        <?= $this->Form->control('name', [
            'label' => 'Package Name',
            'class' => 'form-control'
        ]) ?>
    </div>

    <div class="mb-3">
        <?= $this->Form->control('price', [
            'label' => 'Price (RM)',
            'class' => 'form-control'
        ]) ?>
    </div>

    <div class="mb-4">
        <?= $this->Form->control('includes', [
            'label' => 'Package Includes',
            'type' => 'textarea',
            'class' => 'form-control',
            'rows' => 5,
            'placeholder' => ""
        ]) ?>
    </div>

    <div class="d-flex justify-content-between">
        <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        <?= $this->Form->button('Save Package', ['class' => 'btn btn-success']) ?>
    </div>
<?= $this->Form->end() ?>

