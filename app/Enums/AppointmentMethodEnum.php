<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AppointmentMethodEnum: int implements HasLabel
{
    case IN_PERSONAL = 1;
    case REMOTE = 2;

    public static function toArray(): array
    {
        return [
            self::IN_PERSONAL->value => self::IN_PERSONAL->getLabel(),
            self::REMOTE->value => self::REMOTE->getLabel(),
        ];
    }

    public function getLabel(): ?string
    {
        return match($this) {
            self::IN_PERSONAL => 'In-person',
            self::REMOTE => 'Remote',
        };
    }
}
