<h1>Hall Detail</h1>

<table class="table table-bordered">
    <tr><th>Name</th><td><?= h($hall->name) ?></td></tr>
    <tr><th>Capacity</th><td><?= h($hall->capacity) ?> pax</td></tr>
    <tr><th>Min Booking Day</th><td><?= h($hall->min_booking_day) ?> day(s)</td></tr>
    <tr><th>Weekday Rate</th><td>RM <?= number_format($hall->weekday_rate, 2) ?></td></tr>
    <tr><th>Weekend Rate</th><td>RM <?= number_format($hall->weekend_rate, 2) ?></td></tr>
</table>

<div class="mt-3">
    <?= $this->Html->link('Edit', ['action' => 'edit', $hall->id], ['class' => 'btn btn-warning me-2']) ?>
    <?= $this->Form->postLink('Delete', ['action' => 'delete', $hall->id], [
        'confirm' => 'Are you sure?',
        'class' => 'btn btn-danger me-2'
    ]) ?>
    <?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>

