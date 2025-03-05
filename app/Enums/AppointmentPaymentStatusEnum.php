<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AppointmentPaymentStatusEnum: int implements HasLabel
{
    case PENDING = 1;
    case HALF = 2;
    case PAID = 3;

    public static function toArray(): array
    {
        return [
            self::PENDING->value => self::PENDING->getLabel(),
            self::HALF->value => self::HALF->getLabel(),
        ];
    }

    public function getLabel(): string
    {
        return match($this) {
            self::PENDING => 'Pending',
            self::HALF => 'Half',
            self::PAID => 'Paid',
        };
    }
}
