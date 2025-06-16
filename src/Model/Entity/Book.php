<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $author
 * @property string|null $publisher
 * @property int|null $publishing_year
 * @property string|null $isbn
 * @property string|null $edition
 * @property string|null $genre
 * @property string|null $cost
 * @property string|null $price
 * @property int|null $quantity
 * @property string|null $language
 */
class Book extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'title' => true,
        'author' => true,
        'publisher' => true,
        'publishing_year' => true,
        'isbn' => true,
        'edition' => true,
        'genre' => true,
        'cost' => true,
        'price' => true,
        'quantity' => true,
        'language' => true,
    ];
}
