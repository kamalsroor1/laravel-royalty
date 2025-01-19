<?php

namespace laratrist\Royalty\Actions;

use laratrist\Royalty\Models\Point;

abstract class ActionAbstract
{
    /**
     * Set the action key.
     *
     * @return mixed
     */
    abstract public function key();

    /**
     * Get the model for the given.
     *
     * @return mixed
     */
    public function getModel()
    {
        return config('royalty.point.model')::where('key', $this->key())->first();
    }
}
