<?php

namespace App\Enums;
enum Priority: string
{
    case Low = 'low';
    case Medium = 'medium';
    case Hight = 'hight';

    public function color(): string
    {
        return match ($this) {
            self::Low => 'gray',
            self::Medium => 'warning',
            self::Hight => 'danger'
        };
    }
  
}
