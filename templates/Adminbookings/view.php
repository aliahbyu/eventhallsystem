<h1 class="mb-4">Admin Booking Details</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= h($adminbooking->id) ?></td>
    </tr>
    <tr>
        <th>Event Name</th>
        <td><?= h($adminbooking->booking->event_name ?? '-') ?></td>
    </tr>
    <tr>
        <th>Customer Name</th>
        <td><?= h($adminbooking->booking->user->name ?? 'N/A') ?></td>
    </tr>
    <tr>
        <th>Hall</th>
        <td><?= h($adminbooking->booking->hall->name ?? '-') ?></td>
    </tr>
    <tr>
        <th>Package</th>
        <td><?= h($adminbooking->booking->package->name ?? '-') ?></td>
    </tr>
    <tr>
        <th>Event Date</th>
        <td><?= h($adminbooking->booking->event_date ?? '-') ?></td>
    </tr>
</table>

<div class="mt-3 text-end">
    <?= $this->Html->link('Back to List', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
</div>






