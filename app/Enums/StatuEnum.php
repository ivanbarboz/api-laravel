<?php

declare(strict_types=1);

namespace App\Enums;

enum StatuEnum : string
{
    case OCUPADO = 'Ocupado';
    case DISPONIBLE = 'Disponible';
    case CONCLUIDO = 'Concluido';
}