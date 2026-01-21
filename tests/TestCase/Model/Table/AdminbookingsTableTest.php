<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdminbookingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdminbookingsTable Test Case
 */
class AdminbookingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdminbookingsTable
     */
    protected $Adminbookings;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Adminbookings',
        'app.Bookings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Adminbookings') ? [] : ['className' => AdminbookingsTable::class];
        $this->Adminbookings = $this->getTableLocator()->get('Adminbookings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Adminbookings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdminbookingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdminbookingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
