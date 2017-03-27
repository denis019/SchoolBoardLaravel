<?php
namespace App\Core\Service\Student\Exceptions;

use App\Core\Parents\AbstractException;

class StudentNotFoundException extends AbstractException {
    protected $message = 'Student Not Found';
    protected $statusCode = '0001';
    protected $code = 404;
}