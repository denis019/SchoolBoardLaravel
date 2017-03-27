<?php

namespace App\Http\Controllers;

use App\Core\Parents\AbstractException;
use App\Http\Response\ResponseTrait;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait;

    const JSON_FORMAT = 'json';
    const XML_FORMAT = 'xml';

    protected $format = self::JSON_FORMAT;

    protected function _api(\Closure $callback) {
        try {
            $args = func_get_args();

            $data = call_user_func_array($callback, $args);

            return $this->successResponse($data, $this->format);
        } catch (AbstractException $ex) {
            return $this->errorsResponse($ex->getType(), $ex->getStatusCode(), $ex->getMessage(), $ex->getCode());
        } catch (\Exception $ex) {
            $this->_logException($ex);
            return $this->errorsResponse('Unknown Type', $ex->getCode(), $ex->getMessage(), 500);
        }
    }

    private function _logException(\Exception $ex) {
        Log::error($ex->getMessage(), array(
            'file' => $ex->getFile(),
            'line' => $ex->getLine()
        ));
    }
}
