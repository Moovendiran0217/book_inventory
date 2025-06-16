<div class="container bg-white p-5">
    <h4 class="mb-3 text-secondary">Edit Book</h4>

    <?= $this->Flash->render() ?>

    <?= $this->Form->create(
        $book,
        [
            'class' => 'needs-validation', // Enables Bootstrap 5 validation styles
            'novalidate' => true            // Disables HTML5 validation to use custom validation
        ]
    ) ?>

    <div class="row">

        <div class="mb-3  col-md-4">
            <?= $this->Form->control(
                'title',
                [
                    'label' => 'Title',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'author',
                [
                    'label' => 'Author Name',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'publisher',
                [
                    'label' => 'Publisher',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'publishing_year',
                [
                    'label' => 'Publishing_year',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'isbn',
                [
                    'label' => 'ISBN',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'edition',
                [
                    'label' => 'Edition',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'genre',
                [
                    'label' => 'Genre',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'cost',
                [
                    'label' => 'Cost',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'price',
                [
                    'label' => 'Price',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'quantity',
                [
                    'label' => 'Quantity',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-4">
            <?= $this->Form->control(
                'language',
                [
                    'label' => 'Language',
                    'class' => 'form-control',
                    'required' => true
                ]
            ) ?>
        </div>

        <div class="d-flex justify-content-center">
            <?= $this->Form->button(
                ('Submit'),
                ['class' => 'btn btn-success me-2']
            ) ?>
            <?= $this->Html->link(
                'Cancel',
                ['action' => 'index'],
                ['class' => 'btn btn-danger']
            ) ?>
        </div>

    </div>
    <?= $this->Form->end() ?>
</div>