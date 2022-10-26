<?php

namespace vloop\tree\closure\tests\unit;

use Codeception\Test\Unit;
use vloop\tree\closure\ClosureTree;
use vloop\tree\closure\NodeStruct;
use yii\helpers\VarDumper;

class ClosureTreeTest extends Unit
{
    private $nodes;

    protected function _before()
    {
        $this->nodes = [
            new NodeStruct(1, 11, 1),
            new NodeStruct(2, 11, 2),
            new NodeStruct(4, 11, 3),
            new NodeStruct(4, 2, 1),
            new NodeStruct(4, 1, 2),
            new NodeStruct(2, 1, 11)
        ];
        parent::_before();
    }

    public function testAddElements()
    {
        $tree = new ClosureTree($this->nodes);
        $tree = $tree->addRelation(11, 20);
        VarDumper::dump($tree->nodes());die;
    }
}