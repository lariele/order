<?php

namespace Lariele\Order\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self new()
 * @method static self processing()
 * @method static self completed()
 * @method static self canceled()
 * @method static self deleted()
 */
class OrderStatus extends Enum
{
    protected static function labels(): array
    {
        return [
            'new' => 'New',
            'processing' => 'Processing',
            'completed' => 'Completed',
            'canceled' => 'Canceled',
            'deleted' => 'Deleted',
        ];
    }
}
