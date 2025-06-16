<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceItem Entity
 *
 * @property int $id
 * @property int $invoice_number
 * @property int $book_id
 * @property string $title
 * @property string $price
 * @property int $quantity
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\Book $book
 */
class InvoiceItem extends Entity
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
        'invoice_number' => true,
        'book_id' => true,
        'title' => true,
        'price' => true,
        'quantity' => true,
        'created' => true,
        'invoice' => true,
        'book' => true,
    ];
}
