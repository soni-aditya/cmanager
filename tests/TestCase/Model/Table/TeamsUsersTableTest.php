<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamsUsersTable Test Case
 */
class TeamsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamsUsersTable
     */
    public $TeamsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teams_users',
        'app.teams',
        'app.leaders',
        'app.projects',
        'app.users',
        'app.types',
        'app.menus',
        'app.menus_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TeamsUsers') ? [] : ['className' => TeamsUsersTable::class];
        $this->TeamsUsers = TableRegistry::get('TeamsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TeamsUsers);

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
