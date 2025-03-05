<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AppointmentStatusEnum: int implements HasLabel
{
    case PENDING = 1;
    case CONFIRMED = 2;
    case COMPLETED = 3;
    case CANCELLED = 4;

    public static function toArray(): array
    {
        return [
            self::PENDING->value => self::PENDING->getLabel(),
            self::CONFIRMED->value => self::CONFIRMED->getLabel(),
            self::COMPLETED->value => self::COMPLETED->getLabel(),
            self::CANCELLED->value => self::CANCELLED->getLabel(),
        ];
    }

    public function getLabel(): ?string
    {
        return match($this) {
            self::PENDING => 'Pending',
            self::CONFIRMED => 'Confirmed',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
        };
    }
}
