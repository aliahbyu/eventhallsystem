<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HallsFixture
 */
class HallsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'capacity' => 1,
                'min_booking_day' => 1,
                'weekday_rate' => 1.5,
                'weekend_rate' => 1.5,
                'created_at' => '2025-07-07 21:03:34',
                'updated_at' => '2025-07-07 21:03:34',
            ],
        ];
        parent::init();
    }
}
