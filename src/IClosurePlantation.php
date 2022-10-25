<?php

namespace vloop\tree\closure;

interface IClosurePlantation
{
    /**
     * @param string $id
     * @param string $parentId
     * @return $this
     */
    public function addElement(string $elementID, string $parentElementID): self;

    /**
     * @return NodeStruct[]
     */
    public function nodes(): array;

    /**
     * @return IClosureTree[]
     */
    public function tries(): array;
}