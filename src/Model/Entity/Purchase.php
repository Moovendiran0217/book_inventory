<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchase Entity
 *
 * @property int $purchase_number
 * @property string $supplier_name
 * @property \Cake\I18n\DateTime|null $purchase_date
 * @property string $book_title
 * @property int|null $quantity
 * @property string|null $cost_per_unit
 * @property \Cake\I18n\Date|null $expected_delivery_date
 * @property string|null $Status
 */
class Purchase extends Entity
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
        'supplier_name' => true,
        'purchase_date' => true,
        'book_title' => true,
        'quantity' => true,
        'cost_per_unit' => true,
        'total' => true,
        'expected_delivery_date' => true,
        'status' => true,
    ];
}
