<?php

namespace ElasticEqb\Test;


//use ElasticEqb\Api\Indices\Index;
use Mockery as m;
use ElasticEqb\Api\Indices\Index;
use ElasticEqb\Test\TestModels\IndexableModel;
use PHPUnit_Framework_TestCase;

class IndexTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        m::close();
    }


    public function testCanCheckIndex()
    {
        $model = m::mock('Illuminate\Database\Eloquent\Model');
        $index = new Index($model);
        $this->assertEquals(false, $index->has('test'));
    }
}
