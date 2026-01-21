<h1>Add Bank Info</h1>

<?= $this->Form->create($home) ?>
    <?= $this->Form->control('bank_name') ?>
    <?= $this->Form->control('bank_account_name') ?>
    <?= $this->Form->control('bank_account_number') ?>
    <?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
