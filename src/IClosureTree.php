<?php

namespace vloop\tree\closure;

interface IClosureTree
{

    public function addElement(string $elementID, string $parentElementID);

    public function maxLevel(): int;

    public function nodes(): array;
}