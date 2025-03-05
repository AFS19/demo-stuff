<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserGenderEnum: int implements HasLabel
{
    case MALE = 1;
    case FEMALE = 2;

    public static function toArray(): array
    {
        return [
            self::MALE->value => self::MALE->getLabel(),
            self::FEMALE->value => self::FEMALE->getLabel(),
        ];
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }
}
