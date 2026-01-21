<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFixture
 */
class BookingsFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor ',
                'event_name' => 'Lorem ipsum dolor sit amet',
                'hall_id' => 1,
                'package_id' => 1,
                'start_date' => '2025-07-07',
                'end_date' => '2025-07-07',
                'total_price' => 1.5,
                'receipt_path' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2025-07-07 20:57:54',
            ],
        ];
        parent::init();
    }
}
