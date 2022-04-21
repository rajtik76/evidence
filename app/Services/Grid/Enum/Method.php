<?php declare(strict_types=1);

namespace App\Services\Grid\Enum;

enum Method
{
    case GET;
    case POST;
    case PATCH;
    case PUT;
    case DELETE;
}
