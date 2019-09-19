<?php

namespace USPSLookup;

use Illuminate\Support\Facades\Facade;

/**
 * @see USPSLookup\Skeleton\SkeletonClass
 */
class USPSLookupFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'uspslookup';
    }
}
