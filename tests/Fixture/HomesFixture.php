<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HomesFixture
 */
class HomesFixture extends TestFixture
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
                'bank_account_name' => 'Lorem ipsum dolor sit amet',
                'bank_account_number' => 'Lorem ipsum dolor sit amet',
                'bank_name' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2025-07-07 22:04:35',
            ],
        ];
        parent::init();
    }
}
