<?php

namespace vloop\tree\closure;

interface ITreeSearch
{
    public function rootId(): string;

    /**
     * @param string $elementId
     * @return NodeStruct[]
     */
    public function rootsIdOf(string $elementId): array;


}