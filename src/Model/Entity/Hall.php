<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Hall extends Entity
{
    protected array $_accessible = [
        'name' => true,
        'capacity' => true,
        'min_booking_day' => true,
        'weekday_rate' => true,
        'weekend_rate' => true,
    ];
}
