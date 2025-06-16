<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksFixture
 */
class BooksFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'author' => 'Lorem ipsum dolor sit amet',
                'publisher' => 'Lorem ipsum dolor sit amet',
                'publishing_year' => 1,
                'isbn' => 'Lorem ipsum dolor ',
                'edition' => 'Lorem ipsum dolor sit amet',
                'genre' => 'Lorem ipsum dolor sit amet',
                'cost' => 1.5,
                'price' => 1.5,
                'quantity' => 1,
                'cover_image' => 'Lorem ipsum dolor sit amet',
                'language' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
