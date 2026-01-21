<h3>Admin Bookings</h3>

<?= $this->Form->create(null, ['type' => 'get', 'class' => 'mb-4']) ?>
<div class="row g-2">
    <div class="col-md-6">
        <?= $this->Form->control('search', [
            'label' => false,
            'placeholder' => 'Search by name, email or phone',
            'value' => $this->request->getQuery('search'),
            'class' => 'form-control'
        ]) ?>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary w-100" type="submit">Search</button>
    </div>
</div>
<?= $this->Form->end() ?>

<!-- ✅ Table Display -->
<?php if (!$adminbookings->isEmpty()): ?>
    <table class="table table-bordered table-striped mt-4">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Event</th>
                <th>Hall</th>
                <th>Package</th>
                <th>Start</th>
                <th>End</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminbookings as $ab): ?>
                <tr>
                    <td><?= $ab->id ?></td>
                    <td><?= h($ab->booking->name) ?></td>
                    <td><?= h($ab->booking->email) ?></td>
                    <td><?= h($ab->booking->event_name) ?></td>
                    <td><?= h($ab->booking->hall->name) ?></td>
                    <td><?= h($ab->booking->package->name) ?></td>
                    <td><?= h($ab->booking->start_date) ?></td>
                    <td><?= h($ab->booking->end_date) ?></td>
                    <td>RM <?= number_format($ab->booking->total_price, 2) ?></td>
                    <td class="text-center">
                        <div class="d-grid gap-1">
                            <?= $this->Html->link(
                                'View',
                                ['controller' => 'Bookings', 'action' => 'view', $ab->booking_id],
                                ['class' => 'btn btn-outline-info btn-sm']
                            ) ?>
                            <?= $this->Html->link(
                                'Edit',
                                ['controller' => 'Bookings', 'action' => 'edit', $ab->booking_id],
                                ['class' => 'btn btn-outline-warning btn-sm']
                            ) ?>
                            <?= $this->Form->postLink(
                                'Delete',
                                ['controller' => 'Bookings', 'action' => 'delete', $ab->booking_id],
                                [
                                    'confirm' => 'Are you sure?',
                                    'class' => 'btn btn-outline-danger btn-sm'
                                ]
                            ) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mt-4 text-end">
        <?= $this->Html->link(
            'Add New Booking',
            ['controller' => 'Bookings', 'action' => 'add'],
            ['class' => 'btn btn-success']
        ) ?>
    </div>

<?php else: ?>
    <div class="alert alert-info">No admin bookings found.</div>
<?php endif; ?>







