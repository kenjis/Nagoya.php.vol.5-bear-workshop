<?php

namespace Koriym\Work\Resource\Page;

use BEAR\Resource\ResourceObject;
use BEAR\Resource\Annotation\Embed;

class User extends ResourceObject
{
    /**
     * @Embed(rel="user", src="app://self/user{?id}")
     */
    public function onGet($id = 0)
    {
        return $this;
    }
}
