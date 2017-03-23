<?php
namespace App\Http\Response;

use Illuminate\Http\Response as BaseResponse;

trait ResponseTrait {

    public function successResponse($data, $format = ResponseInterface::JSON) {
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

    public function errorsResponse(array $errors) {
        return new BaseResponse(json_encode([
            'errors' => $errors
        ], JSON_PRETTY_PRINT), 400);
    }

    public function contentNotFoundResponse() {
        return new BaseResponse('', 204);
    }
}