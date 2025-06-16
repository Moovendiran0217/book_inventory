<div class="container bg-white p-5 shadow-sm rounded-3">

    <h2 class="mb-4">Purchase Report Details</h2>
    <p><strong>Generated On :</strong> <?= h(date('d-m-Y', strtotime($report->generate_date))) ?></p>
    <p><strong>From Date :</strong> <?= h(date('d-m-Y', strtotime($report->from_date))) ?></p>
    <p><strong>To Date :</strong> <?= h(date('d-m-Y', strtotime($report->to_date))) ?></p>
    <p><strong>Total Purchase :</strong> <?= h($report->total_purchase) ?></p>
    
    <div class="mt-4">
        <?php if (!empty($purchase)): ?>
            <h4>Order Details</h4>
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Purchase Number</th>
                        <th>Supplier Name</th>
                        <th>Book Title</th>
                        <th>Purchase Date</th>
                        <th>Quantity</th>
                        <th>Cost Per Unit</th>
                        <th>Total Cost</th>
                        <th>Expected Delivery Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($purchase as $purchase): ?>
                        <tr>
                            <td><?= $purchase->purchase_number !== null ? $this->Number->format($purchase->purchase_number) : '' ?></td>
                            <td><?= h($purchase->supplier_name) ?></td>
                            <td><?= h($purchase->purchase_date) ?></td>
                            <td><?= h($purchase->book_title) ?></td>
                            <td><?= $purchase->quantity !== null ? $this->Number->format($purchase->quantity) : '' ?></td>
                            <td><?= $purchase->cost_per_unit !== null ? number_format($purchase->cost_per_unit,2) : '' ?></td>
                            <td><?= $purchase->total !== null ? number_format($purchase->total,2) : '' ?></td>
                            <td><?= h($purchase->expected_delivery_date) ?></td>
                            <td>
                                <?php
                                $status = h($purchase->status);
                                $color = 'gray';
                                if ($status === 'Pending') {
                                    $color = 'yellow';
                                } elseif ($status === 'Received') {
                                    $color = 'green';
                                } elseif ($status === 'Cancelled') {
                                    $color = 'red';
                                }
                                ?>
                                <span style="color: <?= $color ?>; font-weight: bold;">
                                    <?= ucfirst($status) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <div class="mt-3 text-center">
        <?= $this->Html->link('Back to Purchase Reports', ['action' => 'purchaseReport'], ['class' => 'btn btn-danger']) ?>
    </div>
</div>