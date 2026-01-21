<h1>Bank Info Details</h1>

<table class="table table-bordered">
    <tr>
        <th>Bank Name</th>
        <td><?= h($home->bank_name) ?></td>
    </tr>
    <tr>
        <th>Account Name</th>
        <td><?= h($home->bank_account_name) ?></td>
    </tr>
    <tr>
        <th>Account Number</th>
        <td><?= h($home->bank_account_number) ?></td>
    </tr>
</table>

<?= $this->Html->link('Edit', ['action' => 'edit', $home->id], ['class' => 'btn btn-warning']) ?>
<?= $this->Form->postLink('Delete', ['action' => 'delete', $home->id], ['confirm' => 'Are you sure?', 'class' => 'btn btn-danger']) ?>
<?= $this->Html->link('Back to List', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
