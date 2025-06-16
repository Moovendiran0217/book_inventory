<div class="container bg-white p-5">
    <h4 class="mb-3 fw-bold"><?= ($book->title) ?></h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Book ID</th>
            <td><?= ($book->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($book->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Author') ?></th>
            <td><?= h($book->author) ?></td>
        </tr>
        <tr>
            <th><?= __('Publisher') ?></th>
            <td><?= h($book->publisher) ?></td>
        </tr>
        <tr>
            <th><?= __('Publishing Year') ?></th>
            <td><?= $this->Number->format($book->publishing_year) ?></td>
        </tr>
        <tr>
            <th><?= __('Isbn') ?></th>
            <td><?= h($book->isbn) ?></td>
        </tr>
        <tr>
            <th><?= __('Edition') ?></th>
            <td><?= h($book->edition) ?></td>
        </tr>
        <tr>
            <th><?= __('Genre') ?></th>
            <td><?= h($book->genre) ?></td>
        </tr>
        <tr>
            <th><?= __('Language') ?></th>
            <td><?= h($book->language) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost') ?></th>
            <td><?= number_format($book->cost, 2) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= number_format($book->price, 2) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $book->quantity === 0 ? '<span class="text-danger fw-bold">Mark as Sold</span>' : $this->Number->format($book->quantity) ?>
            </td>
        </tr>
    </table>

    <div class="text-center">
        <?= $this->Html->link(
            'Back to List',
            ['action' => 'index'],
            ['class' => 'btn btn-danger']
        ) ?>
    </div>
