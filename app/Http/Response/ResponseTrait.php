<?php
namespace App\Http\Response;

use Illuminate\Http\Response as BaseResponse;

trait ResponseTrait {

    public function successResponse($data, $format = ResponseInterface::JSON) {
        $format = strtolower($format);

        switch ($format) {
            case ResponseInterface::JSON:
                $output = JsonResponse::getOutput($data);
                break;
            case ResponseInterface::XML:
                $output = XmlResponse::getOutput($data);
                break;
            default:
                $output = JsonResponse::getOutput($data);
                break;
        }

        return $output;
    }

    public function errorsResponse(string $type, string $code, string $message, int $httpCode) {
        return new BaseResponse(json_encode([
            'error' => [
                'type' => $type,
                'code' => $code,
                'message' => $message
            ]
        ], JSON_PRETTY_PRINT), $httpCode);
    }
}