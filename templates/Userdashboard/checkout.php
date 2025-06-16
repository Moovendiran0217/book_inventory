<div class="container p-5 bg-white shadow-sm rounded-3">
    <h2 class="text-center mb-4">🛒Checkout</h2>

    <!-- Display error/success messages -->
    <?= $this->Flash->render() ?>

    <?php if (!empty($cart)): ?>
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Book Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $grandTotal = 0; ?>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= h($item['title']) ?></td>
                        <td>₹ <?= number_format($item['price'], 2) ?></td>
                        <td><?= h($item['quantity']) ?></td>
                        <td>₹ <?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    </tr>
                    <?php $grandTotal += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <p class="fs-5 fw-bold text-center">Total : ₹ <?= number_format($grandTotal, 2) ?></p>
        
        <?= $this->Form->create(null, ['url' => ['action' => 'checkout']]) ?>
        <div class="mb-3">
            <?= $this->Form->control('customer_name', [
                'label' => 'Customer Name (optional)',
                'class' => 'form-control']) 
            ?>
        </div>
        
        <div class="d-flex justify-content-center align-items-center">
            <?= $this->Form->button('Place Order', ['class' => 'me-2 btn btn-success']) ?>
            <?= $this->Html->link('Back to Books', ['action' => 'index'], ['class' => 'btn btn-danger']) ?>
        </div>
        <?= $this->Form->end() ?>
    <?php endif; ?>
</div>