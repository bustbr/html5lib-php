<?php

namespace HTML5Lib\Tests;

SimpleTest::ignore(TestDataHarness::class);
abstract class TestDataHarness extends DataHarness
{
    protected $data;
    public function __construct() {
        parent::__construct();
        $this->data = new TestData($this->filename);
    }
    public function getDescription($test) {
        return $test['data'];
    }
    public function getDataTests() {
        return $this->data->tests;
    }
}

