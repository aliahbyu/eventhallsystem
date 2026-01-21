<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Home Entity
 *
 * @property int $id
 * @property string $bank_name
 * @property string $bank_account_name
 * @property string $bank_account_number
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Home extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'bank_name' => true,
        'bank_account_name' => true,
        'bank_account_number' => true,
        'created' => true,
        'modified' => true,
    ];
}
