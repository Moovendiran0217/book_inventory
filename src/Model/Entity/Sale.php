<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $report_id
 * @property string $total_amount
 * @property int $total_order
 * @property \Cake\I18n\Date $from_date
 * @property \Cake\I18n\Date $to_date
 * @property \Cake\I18n\DateTime|null $generate_date
 */
class Sale extends Entity
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
        'total_amount' => true,
        'total_order' => true,
        'from_date' => true,
        'to_date' => true,
        'generate_date' => true,
    ];
}
