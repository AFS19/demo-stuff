<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentStatusEnum: int implements HasLabel
{
    case PENDING = 1;
    case COMPLETED = 2;

    public static function toArray(): array
    {
        return [
            self::PENDING->value => self::PENDING->getLabel(),
            self::COMPLETED->value => self::COMPLETED->getLabel(),
        ];
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::COMPLETED => 'Completed',
        };
    }
}
