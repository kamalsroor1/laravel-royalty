<?php

namespace laratrist\Royalty\Traits;

use laratrist\Royalty\Actions\ActionAbstract;
use laratrist\Royalty\Events\PointsGiven;
use laratrist\Royalty\Exceptions\PointModelMissingException;
use laratrist\Royalty\Formatters\PointsFormatter;

trait CollectsPoints
{
    /**
     * The "booting" method of the trait.
     *
     * @return void
     *
     */
    public static function bootCollectsPoints()
    {
        //
    }

    /**
     * Get the sum of user's points.
     *
     * @return mixed
     */
    public function points()
    {
        return new PointsFormatter(
            $this->pointsRelation->sum('points')
        );
    }

    /**
     * Add given point to user.
     *
     * @param \laratrist\Royalty\Actions\ActionAbstract $action
     * @return void
     * @throws PointModelMissingException
     */
    public function givePoints(ActionAbstract $action)
    {
        if (!$model = $action->getModel()) {
            throw new PointModelMissingException(
                __('Points model for key [:key] not found.', ['key' => $action->key()])
            );
        }

        $this->pointsRelation()->attach($model);

        event(new PointsGiven($this, $model));
    }

    /**
     * Get the user's points.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pointsRelation()
    {
        return $this->belongsToMany(config('royalty.point.model'))
            ->withTimestamps();
    }
}
