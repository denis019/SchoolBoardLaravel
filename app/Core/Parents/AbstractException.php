<?php
namespace App\Core\Parents;

use Symfony\Component\HttpKernel\Exception\HttpException;

class AbstractException extends HttpException {
    protected $statusCode = 500;
    protected $message = 'Error occurred';
    protected $code = '0000';

    public function __construct() {
        parent::__construct($this->statusCode, $this->message, $this, array(), $this->code);
    }

    public function getType() {
        $className = explode('\\', static::class);

        return end($className);
    }
}