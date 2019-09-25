<?php

namespace HTML5Lib\Tests;

require_once dirname(__FILE__) . '/../autorun.php';

class ParserTest extends UnitTestCase
{
    public function testParse() {
        $result = \HTML5Lib\Parser::parse('<html><body></body></html>');
        $this->assertIsA($result, 'DOMDocument');
    }
    public function testParseFragment() {
        $result = \HTML5Lib\Parser::parseFragment('<b>asdf</b> foo');
        $this->assertIsA($result, 'DOMNodeList');
    }
}
