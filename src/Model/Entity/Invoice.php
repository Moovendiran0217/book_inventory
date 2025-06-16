<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $invoice_number
 * @property string|null $customer_name
 * @property string $total
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\InvoiceItem[] $invoice_items
 */
class Invoice extends Entity
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
        'customer_name' => true,
        'total' => true,
        'created' => true,
        'invoice_items' => true,
    ];
}
