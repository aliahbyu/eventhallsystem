<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Adminbooking extends Entity
{
    protected array $_accessible = [
        'booking_id' => true,
        'booking' => true,
    ];
}

