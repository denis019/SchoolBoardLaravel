<?php
namespace App\Http\Response;


use SoapBox\Formatter\Formatter;

class JsonResponse implements ResponseInterface {

    /**
     * @param array $data
     * @return ResponseTrait
     */
    public static function getOutput($data = []) {
        $data = array(
            'data' => $data
        );

        $formatter = Formatter::make($data, Formatter::ARR);
        return response($formatter->toJson(), 200)->header('Content-Type', 'application/json');
    }
}