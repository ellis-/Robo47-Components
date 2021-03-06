<?php

require_once dirname(__FILE__ ) . '/../../TestHelper.php';

/**
 * @group Robo47_Filter
 * @group Robo47_Filter_SanitizeUrl
 */
class Robo47_Filter_SanitizeUrlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function filterProvider()
    {
        $data = array();

        $data[] = array('foo', 'foo');
        $data[] = array('', '');
        $data[] = array('-', '');
        $data[] = array('!"§$%&/()=?µ;:+-#µ@', '');
        $data[] = array('-äöüß-ÄÖÜ-', 'aeoeues-AeOeUe');
        $data[] = array('a--a', 'a-a');
        $data[] = array('a---------------_------------------a', 'a-_-a');

        return $data;
    }

    /**
     * @dataProvider filterProvider
     * @covers Robo47_Filter_SanitizeUrl::filter
     */
    public function testFilter($value, $expectedValue)
    {
        $filter = new Robo47_Filter_SanitizeUrl();
        $this->assertSame($expectedValue, $filter->filter($value));
    }
}