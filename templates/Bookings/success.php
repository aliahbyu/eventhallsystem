<h2>Booking Successful</h2>

<p><strong>Name:</strong> <?= h($booking->name) ?></p>
<p><strong>Email:</strong> <?= h($booking->email) ?></p>
<p><strong>Phone:</strong> <?= h($booking->phone) ?></p>
<p><strong>Event:</strong> <?= h($booking->event_name) ?></p>
<p><strong>Hall:</strong> <?= h($booking->hall->name) ?></p>
<p><strong>Package:</strong> <?= h($booking->package->name) ?></p>
<p><strong>Start Date:</strong> <?= h($booking->start_date) ?></p>
<p><strong>End Date:</strong> <?= h($booking->end_date) ?></p>
<p><strong>Total Price:</strong> RM<?= h($booking->total_price) ?></p>

<?= $this->Html->link('Download Invoice (PDF)', ['action' => 'invoice', $booking->id], ['class' => 'button']) ?>
