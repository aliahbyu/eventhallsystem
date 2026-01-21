<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $event_name
 * @property int $hall_id
 * @property int $package_id
 * @property \Cake\I18n\Date $start_date
 * @property \Cake\I18n\Date $end_date
 * @property string $total_price
 * @property string|null $receipt_path
 * @property \Cake\I18n\DateTime|null $created_at
 *
 * @property \App\Model\Entity\Hall $hall
 * @property \App\Model\Entity\Package $package
 * @property \App\Model\Entity\Adminbooking[] $adminbookings
 * @property \App\Model\Entity\Payment[] $payments
 */
class Booking extends Entity
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
        'name' => true,
        'email' => true,
        'phone' => true,
        'event_name' => true,
        'hall_id' => true,
        'package_id' => true,
        'start_date' => true,
        'end_date' => true,
        'total_price' => true,
        'receipt_path' => true,
        'created_at' => true,
        'hall' => true,
        'package' => true,
        'adminbookings' => true,
        'payments' => true,
    ];
}
