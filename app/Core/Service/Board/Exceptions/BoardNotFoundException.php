<?php
namespace App\Core\Service\Board\Exceptions;

use App\Core\Parents\AbstractException;

class BoardNotFoundException extends AbstractException {
    protected $message = 'Board Not Found';
    protected $statusCode = '0001';
    protected $code = 404;
}