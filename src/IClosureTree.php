<?php

namespace vloop\tree\closure;

interface IClosureTree
{
    public function mergeWithTree(IClosureTree $tree, string $parentNodeName);

    /**
     * @return TreePathStruct[]
     */
    public function tree(): array;

    public function addNode(string $nodeName, string $parentNodeName): self;
}