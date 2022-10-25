<?php

namespace vloop\tree\closure;

use vloop\tree\closure\exceptions\NotSearchedNode;
use vloop\tree\closure\validation\IValidator;

class ClosureTree
{
    private $handleThrow;
    private $nodes;
    private $search;

    /**
     * @param NodeStruct[] $existedNodes
     * @param bool $handleThrow
     */
    public function __construct(array $existedNodes = [], bool $handleThrow = false)
    {
        $this->nodes = $existedNodes;
        $this->handleThrow = $handleThrow;
        $this->search = new NodesSearch($this->nodes);
    }

    /**
     * @param string $elementID
     * @param string $parentElementID
     * @return $this
     */
    public function addElement(string $elementID, string $parentElementID)
    {
        $this->search->searchParentNodes($id)

//        $nodesList = [
//            new NodeStruct($elementID, $parentElementID, 1)
//        ];
//        $childNodes = $this->searchChildNodes($elementID);
//        $parentNodes = $this->searchParentNodes($parentElementID);
//        foreach ($parentNodes as $parentNode) {
//            $nodesList[] = new NodeStruct(
//                $elementID,
//                $parentNode->id(),
//                $parentNode->level() + 1
//            );
//            foreach ($childNodes as $childNode){
//                $nodesList[] = new NodeStruct(
//                    $childNode->id(),
//                    $parentNode->id(),
//                    $parentNode->level() + $childNode->level() + 1
//                );
//            }
//        }
//
//        return new self($nodesList);
    }

    public function maxLevel(): int
    {

    }

    /**
     * @return NodeStruct[]
     */
    public function nodes(): array
    {

    }

    /**
     * @param string $id
     * @return NodeStruct
     * @throws NotSearchedNode
     */
    private function searchNodeById(string $id): NodeStruct
    {
        foreach ($this->nodes as $node){
            if($node->id() == $id){
                return $node;
            }
        }
        throw new NotSearchedNode();
    }
}