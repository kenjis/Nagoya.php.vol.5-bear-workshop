<?php

namespace Koriym\Work\Resource\App;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Annotation\Cache;

class User extends ResourceObject
{
    private $data = [
        0 => ['name' => 'BEAR',   'age' => 10],
        1 => ['name' => 'Sunday', 'age' => 3]
    ];

    /**
     * @Cache(10)
     */
    public function onGet($id = 0)
    {
        $this->body = $this->data[$id];
        
        return $this;
    }
}
