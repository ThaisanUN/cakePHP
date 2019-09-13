<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LanguageTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LanguageTable Test Case
 */
class LanguageTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LanguageTable
     */
    public $Language;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Language',
        'app.ProcessName'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Language') ? [] : ['className' => LanguageTable::class];
        $this->Language = TableRegistry::getTableLocator()->get('Language', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Language);

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
}
