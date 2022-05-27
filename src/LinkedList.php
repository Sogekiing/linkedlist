<?php

namespace Jair;
use Jair\Node;

class LinkedList
{
    private int $size;
    private ?Node $head;

    public function __construct()
    {
        $this->size = 0;
        $this->head = null;
    }

    public function push($elem) {
        if (isset($this->head)) {
            $pointer = $this->head;

            while ($pointer->next) {
                $pointer = $pointer->next;
            }

            $pointer->next = new Node($elem);
        } else {
            $this->head = new Node($elem);
        }
        $this->size++;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    private function getNode($index): Node
    {
        $pointer = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $pointer = $pointer->next;
            if (!isset($pointer)) {
                throw new \OutOfRangeException("list index out of range");
            }
        }
        return $pointer;
    }
    public function getItem(int $index): mixed
    {
        if (!isset($this->head)) {
            throw new \OutOfRangeException("list index out of range");
        }

       $pointer = $this->getNode($index);

       return $pointer->data;
    }

    public function setItem(int $index, mixed $elem): void
    {
        if (!isset($this->head)) {
            throw new \OutOfRangeException("list index out of range");
        }

        $pointer = $this->getNode($index);

        $pointer->data = $elem;
    }

    public function search($elem): int
    {
        $pointer = $this->head;
        $index = 0;
        while($pointer) {
            if ($pointer->data == $elem) {
                return $index;
            }
            $pointer = $pointer->next;
            $index++;
        }
        return -1;
    }

    public function insert(int $index, mixed $elem): void
    {
        $node = new Node($elem);
        if ($index == 0) {
            $node->next = $this->head;
            $this->head = $node;
        } else {
            $pointer = $this->getNode($index - 1);

            $node->next = $pointer->next;
            $pointer->next = $node;
        }
        $this->size++;
    }

    public function remove($elem): void
    {
        if (!isset($this->head)) {
            throw new \ValueError("$elem is not in list");
        }

        if ($this->head->data == $elem) {
            $this->head = $this->head->next;
            $this->size--;
            return;
        }

        $ancestor = $this->head;
        $pointer = $this->head->next;
        while ($pointer) {
            if ($pointer->data == $elem) {
                $ancestor->next = $pointer->next;
                $this->size--;
                return;
            }
            $ancestor = $pointer;
            $pointer = $pointer->next;
        }

        throw new \ValueError("$elem is not in list");
    }

}