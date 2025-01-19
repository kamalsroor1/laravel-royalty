<?php

namespace laratrist\Royalty\Tests\Points\Actions;

use laratrist\Royalty\Actions\ActionAbstract;

class DeleteablePoint extends ActionAbstract
{
    /**
     * Set the action key.
     *
     * @return mixed
     */
    public function key()
    {
        return 'deleteable-point';
    }
}
