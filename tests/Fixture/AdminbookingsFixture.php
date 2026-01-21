<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdminbookingsFixture
 */
class AdminbookingsFixture extends TestFixture
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
                'booking_id' => 1,
                'created_at' => '2025-07-07 22:40:44',
                'updated_at' => '2025-07-07 22:40:44',
            ],
        ];
        parent::init();
    }
}
