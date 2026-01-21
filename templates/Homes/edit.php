<h1>Edit Bank Info</h1>

<?= $this->Form->create($home) ?>
    <?= $this->Form->control('bank_name') ?>
    <?= $this->Form->control('bank_account_name') ?>
    <?= $this->Form->control('bank_account_number') ?>
    <?= $this->Form->button('Update', ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>
