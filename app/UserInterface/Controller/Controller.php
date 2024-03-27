<?php

namespace App\UserInterface\Controller;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\JsonResponse;

/**
 * Abstract controller class
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
abstract class Controller
{
    private const RESPONSE_OK = 'ok';

    private const RESPONSE_MESSAGE_KEY = 'message';

    private const RESPONSE_ERRORS_KEY = 'errors';

    private const MESSAGE_FAILED_VALIDATION = 'The given data was invalid';

    private const MESSAGE_INTERNAL_SERVER_ERROR = 'Internal server error';

    /**
     * Return standard successful json response
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function getSuccessfulJsonResponse(int $status = 200): JsonResponse
    {
        return response()->json([self::RESPONSE_OK], $status);
    }

    /**
     * Return failed response for failed validation
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function getFailedValidationResponse(Jsonable $errors): JsonResponse
    {
        return $this->getFailedResponseWithMessages(
            self::MESSAGE_FAILED_VALIDATION,
            422,
            $errors
        );
    }

    /**
     * Return response for internal server errors
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function getInternalErrorResponse(): JsonResponse
    {
        return $this->getFailedResponseWithMessages(
            self::MESSAGE_INTERNAL_SERVER_ERROR,
            500,
        );
    }

    /**
     * Return failed response with or without detailed errors
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function getFailedResponseWithMessages(
        string $message,
        int $status,
        ?Jsonable $errors = null
    ): JsonResponse {
        $responseBody = [self::RESPONSE_MESSAGE_KEY => $message];
        if ($errors) {
            $responseBody[self::RESPONSE_ERRORS_KEY] = $errors;
        }

        return response()->json($responseBody, $status);
    }
}
