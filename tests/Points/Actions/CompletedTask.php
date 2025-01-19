<?php

namespace laratrist\Royalty\Tests\Points\Actions;

use laratrist\Royalty\Actions\ActionAbstract;

class CompletedTask extends ActionAbstract
{
    /**
     * Set the action key.
     *
     * @return mixed
     */
    public function key()
    {
        return 'completed-task';
    }
}
