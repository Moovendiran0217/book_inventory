<div class="container bg-white p-5 shadow-sm rounded-3">
    <h1 class="text-center mb-4">🛒 Your Shopping Cart</h1>

    <?= $this->Flash->render() ?>

    <?php if (!empty($cart)): ?>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Userdashboard', 'action' => 'update']]) ?>
        
        <table class="mt-2 table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Book Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= h($item['title']) ?></td>
                        <td>₹ <?= number_format($item['price'], 2) ?></td>
                        <td>
                            <input type="number" class="form-control text-center mx-auto"
                            name="quantities[<?= $item['id'] ?>]"
                            value="<?= $item['quantity'] ?>"
                            min="0"
                            style="width: 100px;">
                        </td>
                        <td>₹ <?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                        <td>
                            <?= $this->Html->link('Remove',
                            ['action' => 'removeFromCart', $item['id']],
                            ['class' => 'btn btn-sm btn-danger']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="d-flex justify-content-center align-items-center mb-3">
            <?= $this->Form->button('Update Cart', ['class' => 'me-4 btn btn-primary']) ?>
            <?= $this->Html->link('Back to Books', ['action' => 'index'], ['class' => 'btn btn-danger']) ?>
        </div>
        
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-5 fw-bold">Grand Total : ₹ <?= number_format($totalPrice, 2) ?></p>
            <?= $this->Html->link('Proceed to Checkout', ['action' => 'checkout'], ['class' => 'btn btn-success']) ?>
        </div>
        <?= $this->Form->end() ?>

    <?php else: ?>
        <div class="alert alert-info text-center">
            <p>Your cart is empty.</p>
            <?= $this->Html->link('Back to Books', ['action' => 'index'],['class' => 'btn btn-primary']) ?>
        </div>
    <?php endif; ?>
</div>

