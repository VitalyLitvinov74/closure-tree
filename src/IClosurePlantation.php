<?php

namespace vloop\tree\closure;

interface IClosurePlantation
{
    /**
     * @return $this
     */
    public function diffTries(): self;

    /**
     * @return NodeStruct[]
     */
    public function hashPaths(): array;

    /**
     * @return IClosureTree[]
     */
    public function tries(): array;
}