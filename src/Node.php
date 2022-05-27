<?php

namespace Jair;
require "vendor/autoload.php";

class Node
{
    public mixed $data;
    public ?Node $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}