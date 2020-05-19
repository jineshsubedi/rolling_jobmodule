<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use DB;
use App\Http\Controllers\Controller;
use App\Imagetool;
use App\library\myFunctions;
use App\library\Settings;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($e instanceof NotFoundHttpException)
    {
         $view = $request->is('app/*') ? 'app.errors.404' : 'errors.404';
        $meta_title='404 Page not found';
        $meta_description='';
        $meta_keyword='';

        
        
    $datas = array(
      'header' => \App\Http\Controllers\front\Common\HeaderController::index($meta_title,$meta_keyword,$meta_description),
      'footer' => \App\Http\Controllers\front\Common\FooterController::index(),
      
      );

       $purna = 'Page Not found 404';
        return response()->view('errors.404', compact('datas'), 404);
    }
        return parent::render($request, $e);
    }
}
