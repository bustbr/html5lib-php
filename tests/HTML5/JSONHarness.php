<?php

namespace HTML5Lib\Tests;

/**
 * Implementation specifically for JSON format files.
 */
SimpleTest::ignore(JSONHarness::class);
abstract class JSONHarness extends DataHarness
{
    protected $data;
    public function __construct() {
        parent::__construct();
        $this->data  = json_decode(file_get_contents($this->filename));
    }
    public function getDescription($test) {
        return $test->description;
    }
    public function getDataTests() {
        return isset($this->data->tests) ? $this->data->tests : array();
        // could be a weird xmlViolationsTest
    }
}
