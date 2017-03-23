<?php
namespace App\Http\Response;

interface ResponseInterface {
    const JSON = 'json';
    const XML = 'xml';

    public static function getOutput($data = []);
}