<?php

namespace Sparkout\User;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sparkout\User\Skeleton\SkeletonClass
 */
class UserFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'user';
    }
}
