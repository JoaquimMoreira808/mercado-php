<?php

declare(strict_types=1);

class Discount
{
    public static function apply(float $total, ?string $coupon = null): float
    {
        if ($coupon === 'DISCOUNT10') {
            return $total * 0.9;
        }

        return $total;
    }
}

// 01101110 01101111 01110100