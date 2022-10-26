<?php

namespace vloop\tree\closure;

use vloop\tree\closure\exceptions\NotSearchedNode;
use vloop\tree\closure\validation\IValidator;
use yii\debug\models\timeline\Search;

class ClosureTree implements IClosureTree
{
    private $handleThrow;
    private $nodes;

    /**
     * @param NodeStruct[] $existedNodes
     * @param bool $handleThrow
     */
    public function __construct(array $existedNodes = [], bool $handleThrow = false)
    {
        $this->nodes = $existedNodes;
        $this->handleThrow = $handleThrow;

    }

    /**
     * @param IClosureTree $anotherTree - another tree for relation
     * @param string $viaParentElement - element in current tree to which need connect another tree
     * @return IClosureTree - new Closure tree
     */
    public function mergeWith(IClosureTree $anotherTree, string $viaParentElement): IClosureTree
    {
        $childRoot = $this->searchRootId($anotherTree);
        $newNodesList = array_merge(
            [new NodeStruct($childRoot, $viaParentElement, 1)],
            $anotherTree->hashPath(),
            $this->hashPath()
        );
        $parentRoots = $this->searchRootsNodes($this, $viaParentElement);
        foreach ($parentRoots as $node) {
            foreach ($anotherTree->hashPath() as $childNode) {
                $newNodesList[] = new NodeStruct(
                    $childNode->id(),
                    $node->id(),
                    $node->level() + $childNode + 1
                );
            }
        }
        return new self($newNodesList);
    }

    public function maxLevel(): int
    {
        $max = 0;
        foreach ($this->nodes as $node) {
            if ($node->level() > $max) {
                $max = $node->level();
            }
        }
        return $max;
    }

    /**
     * @return NodeStruct[]
     */
    public function hashPath(): array
    {
        return $this->nodes;
    }

    private function searchRootId(IClosureTree $tree): string
    {
        $nodeWithMaxLevel = $tree->hashPath()[0];
        foreach ($tree->hashPath() as $node){
            if($node->level() > $nodeWithMaxLevel->level()){
                $nodeWithMaxLevel = $node;
            }
        }
        return $nodeWithMaxLevel->id();
    }

    /**
     * @param IClosureTree $tree
     * @param string $elementId
     * @return NodeStruct[]
     */
    private function searchRootsNodes(IClosureTree $tree, string $elementId): array
    {
        $needleNodes = [];
        foreach ($tree->hashPath() as $node){
            if($node->id() == $elementId){
                $needleNodes[] = $node;
            }
        }
        return $needleNodes;
    }
}