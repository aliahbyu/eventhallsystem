<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HomesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HomesTable Test Case
 */
class HomesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HomesTable
     */
    protected $Homes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Homes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Homes') ? [] : ['className' => HomesTable::class];
        $this->Homes = $this->getTableLocator()->get('Homes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Homes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HomesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
