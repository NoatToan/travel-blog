<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
    $this->reportable(function (Throwable $e) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }
        });
        $this->renderable(function (BroadcastException $e) {
            Log::channel('pusher')->error($e);

            return Response::serverError(__('messages.pusher.common_error'));
        });
        $this->renderable(function (ModelNotFoundException $e) {
            return Response::clientError(__('messages.errors.crud.not_exist'), 404);
        });
        $this->renderable(function (NotFoundHttpException $e) {
            if ($e->getPrevious() instanceof ModelNotFoundException) {
                return Response::clientError(__('messages.errors.crud.not_exist'), 404);
            }

            return Response::clientError(__('message_error_page.404.title'), 404);
        });
        $this->renderable(function (AuthenticationException $e) {
            return Response::clientError(__('alias_template.login.not_login'), 401);
        });
        $this->renderable(function (ValidationException $e) {
            return Response::showMessageError(__('message_error_page.422'), $e->errors());
        });
        $this->renderable(function (NotAuthorizedOnTournament $e) {
            return Response::clientError(__('messages.errors.crud.not_authorized'), 403);
        });
        $this->renderable(function (Exception $exception) {
            return Response::serverError('サーバエラーが発生しました。');
        });
    }
}
