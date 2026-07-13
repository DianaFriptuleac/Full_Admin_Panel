<?php

namespace App\Enums;

enum Status: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';

    public function label(): string    // Il tipo di ritorno ": string" indica che il metodo restituirà una stringa
    {
        // "match" confronta il valore corrente dell'enum ($this)
       // con i vari case definiti nell'enum Status
        return match ($this) {

             // Se lo stato corrente è Pending,
             // restituisce la stringa "Pending"
            self::Pending => 'Pending',
            self::InProgress => 'In Progress',
            self::Completed => 'Completed',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::InProgress => 'info',
            self::Completed => 'success',
        };
    }
}
