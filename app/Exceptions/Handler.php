<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    
    
    public function render($request, Throwable $exception)
    {
        // Vérifie si l'exception est une 404
        if ($exception instanceof NotFoundHttpException) {

            return response()->view('errors.404', [], 404) ;
        }
        
        if ($exception instanceof AccessDeniedHttpException) {
            
            return response()->view('errors.403', [], 403) ;
        }
        
        
        if ($exception instanceof HttpException) {
              // Enregistre l'erreur dans les logs
            Log::error('Erreur 500 : ' . $exception->getMessage()) ;

            // Retourne une vue avec un message utilisateur
            
            return response()->view('errors.500', [
                'message' => 'Une erreur inattendue est survenue. Nos équipes sont sur le coup !',
            ], 500);
        }

        // Sinon, laisse Laravel gérer
        return parent::render($request, $exception);
    }

}
