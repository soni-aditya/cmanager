<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamsTable Test Case
 */
class TeamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamsTable
     */
    public $Teams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teams',
        'app.leaders',
        'app.types',
        'app.users',
        'app.menus',
        'app.menus_types',
        'app.projects',
        'app.teams_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Teams') ? [] : ['className' => TeamsTable::class];
        $this->Teams = TableRegistry::get('Teams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Teams);

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
