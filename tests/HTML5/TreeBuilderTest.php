<?php

namespace HTML5Lib\Tests;

require_once dirname(__FILE__) . '/../autorun.php';

SimpleTest::ignore(TreeBuilderHarness::class);
class TreeBuilderHarness extends TestDataHarness
{
    public function assertIdentical($expect, $actual, $test = array()) {
        $input = $test['data'];
        if (isset($test['document-fragment'])) {
            $input .= "\nFragment: " . $test['document-fragment'];
        }
        parent::assertIdentical($expect, $actual, "Identical expectation failed\nInput:\n$input\n\nExpected:\n$expect\n\nActual:\n$actual\n");
    }
    public function invoke($test) {
        // this is totally the wrong interface to use, but
        // for now we need testing
        $tokenizer = new \HTML5Lib\Tokenizer($test['data']);
        $GLOBALS['TIME'] -= get_microtime();
        if (isset($test['document-fragment'])) {
            $tokenizer->parseFragment($test['document-fragment']);
        } else {
            $tokenizer->parse();
        }
        $GLOBALS['TIME'] += get_microtime();
        $this->assertIdentical(
            $test['document'],
            TestData::strDom($tokenizer->save()),
            $test
        );
    }
}

TestData::generateTestCases(
    TreeBuilderHarness::class,
    'TreeBuilderTestOf',
    'tree-construction', '*.dat'
);

