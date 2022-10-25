<?php

namespace vloop\tree\closure;

class ClosurePlantation implements IClosurePlantation
{
    private $tries;

    public static function fromNodes(array $nodes = []): self
    {

    }

    public function __construct(array $tries = [])
    {
        $this->tries = $tries;
    }

    /**
     * @param string $elementID - element id of first tree
     * @param string $parentElementID - element id of second tree
     * @return $this
     */
    public function mergeTries(string $elementID, string $parentElementID): IClosurePlantation
    {
        $firstTree = $this->treeByElementId($elementID);
        $secondTree = $this->treeByElementId($parentElementID);
        $mergedNodes = array_merge(
            $firstTree->nodes(),
            $secondTree->nodes()
        );
        $this->removeTree($firstTree)->removeTree($secondTree);
        $mergedTree = new ClosureTree($mergedNodes);
        $mergedTree = $mergedTree->addElement($elementID, $parentElementID);
        return new self(
            array_merge($this->tries(), [$mergedTree])
        );
    }

    /**
     * @return IClosureTree[]
     */
    public function tries(): array
    {

    }

    private function treeByElementId(string $elementID): ClosureTree{

    }

    private function removeTree(ClosureTree $closureTree): self{
        $tries = [];
        foreach ($this->tries() as $tree){
            if($tree == $closureTree){
                continue;
            }
            $tries[] = clone ($tree);
        }
        $this->tries = $tries;
        return $this;
    }
}