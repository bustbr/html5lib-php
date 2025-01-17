<?php

namespace HTML5Lib\Tests;

require_once dirname(__FILE__) . '/../autorun.php';

class TestDataTest extends UnitTestCase
{
    function testSample() {
        $data = new TestData(dirname(__FILE__) . '/TestDataTest/sample.dat');
        $this->assertIdentical($data->tests, array(
            array('data' => "Foo", 'des' => "Bar"),
            array('data' => "Foo")
        ));
    }
    function testStrDom() {
        $dom = new DOMDocument();
        $dom->loadHTML('<!DOCTYPE html PUBLIC "http://foo" "http://bar"><html><body foo="bar" baz="1">foo<b>bar</b>asdf</body></html>');
        $this->assertIdentical(TestData::strDom($dom), <<<RESULT
| <!DOCTYPE html "http://foo" "http://bar">
| <html>
|   <body>
|     baz="1"
|     foo="bar"
|     "foo"
|     <b>
|       "bar"
|     "asdf"
RESULT
);
    }
}

