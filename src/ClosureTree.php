<?php

namespace vloop\tree\closure;

class ClosureTree implements IClosureTree
{
    /**
     * @var TreePathStruct[]
     */
    private $paths;

    public static function bySeed(string $idSeed): self
    {
        return new self([
            new TreePathStruct($idSeed, 0, 0)
        ]);
    }

    /**
     * @param TreePathStruct[] $paths
     */
    public function __construct(array $paths = [])
    {
        $this->paths = $paths;
    }

    public function mergeWithTree(IClosureTree $tree, string $parentNodeName)
    {
        // TODO: Implement mergeWithTree() method.
    }

    /**
     * @return TreePathStruct[]
     */
    public function tree(): array
    {
        // TODO: Implement tree() method.
    }

    public function addNode(string $nodeName, string $parentNodeName): IClosureTree
    {
        // TODO: Implement addNode() method.
    }
}