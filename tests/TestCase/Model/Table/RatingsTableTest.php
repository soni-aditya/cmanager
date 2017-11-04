<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RatingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RatingsTable Test Case
 */
class RatingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RatingsTable
     */
    public $Ratings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ratings',
        'app.users',
        'app.types',
        'app.menus',
        'app.menus_types',
        'app.revievers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ratings') ? [] : ['className' => RatingsTable::class];
        $this->Ratings = TableRegistry::get('Ratings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ratings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
