<?php

namespace vloop\tree\closure;

interface IClosureTree
{
    /**
     * @param IClosureTree $anotherTree - another tree for relation
     * @param string $viaParentElement - element in current tree to which need connect another tree
     * @return IClosureTree - new Closure tree
     */
    public function mergeWith(IClosureTree $anotherTree, string $viaParentElement): IClosureTree;

    public function maxLevel(): int;

    /**
     * @return NodeStruct[]
     */
    public function hashPath(): array;
}