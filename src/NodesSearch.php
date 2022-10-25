<?php

namespace vloop\tree\closure;

class NodesSearch
{
    private $nodes;

    public function __construct(array $nodes = [])
    {
    }

    /**
     * @param string $elementId
     * @return NodeStruct[]
     */
    public function searchChildNodes(string $elementID): array
    {

    }

    /**
     * @param NodeStruct $node
     * @return NodeStruct[]
     */
    public function searchParentNodes(string $elementID): array
    {

    }
}