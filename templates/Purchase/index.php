<div class="container-fluid bg-white p-5">

    <h2 class="text-center fw-bold mb-5">List of Purchase Orders</h2>

    <?= $this->Flash->render() ?>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-info">
                <tr>
                    <th><?= $this->Paginator->sort('purchase_number') ?></th>
                    <th><?= $this->Paginator->sort('supplier_name') ?></th>
                    <th><?= $this->Paginator->sort('purchase_date') ?></th>
                    <th><?= $this->Paginator->sort('book_title') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('cost_per_unit') ?></th>
                    <th><?= $this->Paginator->sort('Total Cost') ?></th>
                    <th><?= $this->Paginator->sort('expected_delivery_date') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= 'Edit Order Status' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchase as $purchase): ?>
                    <tr>
                        <td><?= $purchase->purchase_number !== null ? $this->Number->format($purchase->purchase_number) : '' ?>
                        </td>
                        <td><?= h($purchase->supplier_name) ?></td>
                        <td><?= h($purchase->purchase_date) ?></td>
                        <td><?= h($purchase->book_title) ?></td>
                        <td><?= $purchase->quantity !== null ? $this->Number->format($purchase->quantity) : '' ?></td>
                        <td><?= $purchase->cost_per_unit !== null ? number_format($purchase->cost_per_unit, 2) : '' ?></td>
                        <td><?= $purchase->total !== null ? number_format($purchase->total, 2) : '' ?></td>
                        <td><?= h($purchase->expected_delivery_date) ?></td>
                        <td>
                            <?php
                            $status = h($purchase->status);
                            $color = 'black'; // Default color
                            // Determine color based on status
                            if ($status === 'Pending') {
                                $color = 'yellow';
                            } elseif ($status === 'Received') {
                                $color = 'green';
                            } elseif ($status === 'Cancelled') {
                                $color = 'red';
                            }
                            ?>
                            <span style="color: <?= $color ?>; font-weight: bold;">
                                <?= $status ?>
                            </span>
                        </td>
                        <td>

                            <?php if ($purchase->status === 'Received' || $purchase->status === 'Cancelled'): ?>
                                <span class="btn btn-warning btn-sm mb-1 disabled" aria-disabled="true">Recived</span>
                                <span class="btn btn-danger btn-sm mb-1 disabled" aria-disabled="true">Cancel</span>
                            <?php else: ?>

                                <?= $this->Html->link(
                                    'Recived',
                                    ['action' => 'receive', $purchase->purchase_number],
                                    ['class' => 'btn btn-warning btn-sm mb-1']
                                ) ?>

                                <?= $this->Form->postLink(
                                    'Cancel',
                                    ['action' => 'cancel', $purchase->purchase_number],
                                    [
                                        'class' => 'btn btn-danger btn-sm mb-1',
                                        'confirm' => 'Are you sure you want to cancel this purchase order?'
                                    ]
                                ) ?>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->prev('<<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>>') ?>
        </ul>
    </nav>
</div>