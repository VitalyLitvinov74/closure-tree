<?php

namespace vloop\tree\closure;

use vloop\tree\closure\IRowStruct;

class TreePathStruct
{
    private $parentId;
    private $id;
    private $level;

    public function __construct(string $id, string $parentId, int $level)
    {
        $this->parentId = $parentId;
        $this->id = $id;
        $this->level = $level;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function parentId(): string
    {
        return $this->parentId;
    }

    public function level(): int
    {
        return $this->level;
    }
}