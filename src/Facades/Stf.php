<?php

namespace Tir\Storefront\Facades;

use Tir\Setting\Facades\Stg;

class Stf
{

    public static function layout()
    {
        return Stg::get('storefront_layout');
    }

    /**
     * Get class for rating star.
     *
     * @param int|float $rating
     * @param int $forStar
     * @return string
     */
    public static function rating_star_class($rating, $forStar)
    {
        $class = $rating >= $forStar ? 'fa fa-star rated' : 'fa fa-star-o';

        if (fmod($rating, 1) == 0) {
            return $class;
        }

        if (is_float($rating) && ceil($rating) === (float) $forStar) {
            $class = 'fa fa-star-half-o rated';
        }

        return $class;
    }

}