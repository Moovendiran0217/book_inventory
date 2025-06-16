<div class="container bg-white p-5">
    <h4 class="mb-3 text-secondary">Purchase New Book</h4>


    <?= $this->Flash->render() ?>

    <?= $this->Form->create(
        $purchase,
        [
            'class' => 'needs-validation', // Enables Bootstrap 5 validation styles
            'novalidate' => true            // Disables HTML5 validation to use custom validation
        ]
    ) ?>

    <div class="row">

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'book_title',
                [
                    'label' => 'Book Title',
                    'class' => 'form-control',
                    'options' => $books,
                    'empty' => 'Select a Book',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'supplier_name',
                [
                    'label' => 'Supplier Name',
                    'class' => 'form-control',
                    'options' => $suppliers,
                    'empty' => 'Select a Supplier',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'quantity',
                [
                    'label' => 'Quantity',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'cost_per_unit',
                [
                    'label' => 'Cost Per Unit',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'expected_delivery_date',
                [
                    'label' => 'Expected Delivery Date',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="text-center">
            <?= $this->Form->button(
                ('Submit'),
                ['class' => 'btn btn-success']
            ) ?>
        </div>

    </div>
    <?= $this->Form->end() ?>
</div>