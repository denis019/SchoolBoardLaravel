<?php
namespace App\Http\Response;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use SoapBox\Formatter\Formatter;

class XmlResponse implements ResponseInterface {

    /**
     * @param array $data
     * @return ResponseTrait
     */
    public static function getOutput($data = []) {
        if($data instanceof Collection || $data instanceof Model) {
            $data = $data->toArray();
        }

        $formatter = Formatter::make($data, Formatter::ARR);
        return response($formatter->toXml(), 200)->header('Content-Type', 'text/xml');
    }
}