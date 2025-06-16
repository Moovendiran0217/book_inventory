<div class="container bg-white p-5">

    <h4 class="mb-3 fw-bold"><?= ($supplier->name) ?></h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($supplier->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($supplier->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($supplier->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
    </table>

    <div class="text-center">
        <?= $this->Html->link(
            'Back to List',
            ['action' => 'index'],
            ['class' => 'btn btn-danger']
        ) ?>
    </div>
</div>