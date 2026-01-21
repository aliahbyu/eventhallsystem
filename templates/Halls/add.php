<h1>Add New Hall</h1>

<?= $this->Form->create($hall) ?>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('capacity') ?>
    <?= $this->Form->control('min_booking_day') ?>
    <?= $this->Form->control('weekday_rate') ?>
    <?= $this->Form->control('weekend_rate') ?>

    <div class="d-flex justify-content-between">
        <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        <?= $this->Form->button('Save Hall', ['class' => 'btn btn-success']) ?>
    </div>

<?= $this->Form->end() ?>
