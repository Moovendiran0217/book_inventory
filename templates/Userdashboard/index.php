<div class="container-fluid p-5" style="background-color: #f9f7fa;">
    <h1 class="mb-4 text-center">📘Book Inventory</h1>

    <!-- Flash Messages -->
    <?= $this->Flash->render() ?>

    <!-- Search Bar -->
    <div class="mt-3 mb-4">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <?= $this->Form->control('search', [
            'label' => false,
            'placeholder' => 'Search Book by Title...',
            'value' => $this->request->getQuery('search'),
            'class' => 'form-control p-2',
        ]) ?>
        <?= $this->Form->end() ?>
    </div>

    <!-- Book Cards Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
        <?php foreach ($books as $book): ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-light">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold mb-4"><?= h($book->title) ?></h5>
                        <p>Author : <?= h($book->author) ?></p>
                        <hr>
                        <p>Publiser : <?= h($book->publisher) ?></p>
                        <hr>
                        <p><?= $book->quantity == 0 ? '<span class="text-danger fw-bold">Mark as Sold</span>' : 'Quantity : ' . h($book->quantity) ?>
                        </p>
                        <hr>
                        <p>Price : ₹ <?= number_format($book->price, 2) ?></p>

                        <div>
                            <?= $this->Form->create(null, ['url' => ['controller' => 'Userdashboard', 'action' => 'addToCart']]) ?>
                            <?= $this->Form->hidden('cart[id]', ['value' => $book->id]) ?>
                            <?= $this->Form->hidden('cart[title]', ['value' => $book->title]) ?>
                            <?= $this->Form->hidden('cart[price]', ['value' => $book->price]) ?>
                            <?= $this->Form->hidden('cart[quantity]', ['value' => 1]) ?>
                            <?= $this->Form->button('Add to Cart', ['class' => 'btn btn-primary', 'disabled' => $book->quantity == 0]) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
