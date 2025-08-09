<?php

namespace App;

enum AnimalStatus: string
{
    case AVAILABLE = 'available';
    case NOT_AVAILABLE = 'not available';

    public function getLabel(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Available',
            self::NOT_AVAILABLE => 'Not Available',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::AVAILABLE => 'success',
            self::NOT_AVAILABLE => 'danger',
        };
    }
}
