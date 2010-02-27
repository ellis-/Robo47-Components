<?php

require_once dirname(__FILE__) . '/../../../TestHelper.php';

require_once TESTS_PATH . 'Robo47/_files/DoctrineTestCase.php';

class Robo47_Validate_Doctrine_RecordExistsTest extends Robo47_DoctrineTestCase
{
    
    public function setUp()
    {
        $this->_tablesToCreate['testPagination'] = array(
            'id' => array (
                'type' => 'integer',
                'unsigned' => 1,
                'primary' => true,
                'autoincrement' => true,
                'length' => '8',
            ),
            'message' => array (
                'type' => 'string',
                'notnull' => true,
                'length' => '255',
        ));
        parent::setUp();
    }
    
    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @return Doctrine_Table
     */
    public function getTable()
    {
        $entry = new Robo47_Paginator_Adapter_DoctrineTestRecord();
        return $entry->getTable();
    }

    /**
     *
     * @param Doctrine_Table $table
     * @param array $data
     */
    public function create(Doctrine_Table $table, $data)
    {
        foreach ($data as $row) {
            $table->create($row)
                ->save();
        }
    }
    
    public function isValidProvider()
    {
        $data = array();

        $records = array(
            array('message' => 'blub'),
            array('message' => 'bla'),
        );

        $data[] = array($records, 'bla', null, true);
        $data[] = array($records, 'foo', null, false);
        $data[] = array($records, 'bla', array('field' => 'message', 'value' => 'bla'), false);
        $data[] = array($records, 'bla', array('field' => 'message', 'value' => 'blub'), true);

        $data[] = array($records, 'bla', 'message != \'bla\'', false);
        $data[] = array($records, 'bla', 'message != \'blub\'', true);

        return $data;
    }

    /**
     * @dataProvider isValidProvider
     * @covers Robo47_Validate_Doctrine_RecordExists::isValid
     */
    public function testFoo($data, $value, $exclude, $expectedResult)
    {
        $table = $this->getTable();
        $this->create($table, $data);
        $filter = new Robo47_Validate_Doctrine_RecordExists($table, 'message', $exclude);
        $result = $filter->isValid($value);
        $this->assertEquals($expectedResult, $result);
    }

// @todo Test isValid sets the right messages
    public function testMessages()
    {
        $this->markTestIncomplete('not implemented yet');
    }
}