<div class="container-fluid bg-white p-5">

    <h4 class="mb-3 text-secondary">Add New Supplier</h4>

    <?= $this->Flash->render() ?>

    <?= $this->Form->create(
        $supplier,
        [
            'class' => 'needs-validation', // Enables Bootstrap 5 validation styles
            'novalidate' => true            // Disables HTML5 validation to use custom validation
        ]
    ) ?>

    <div class="row">
        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'name',
                [
                    'label' => 'Name',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'address',
                [
                    'label' => 'Address',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'email',
                [
                    'label' => 'Email',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'phone',
                [
                    'label' => 'Phone',
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