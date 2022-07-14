<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {

                case '404':
                    $data['current_language'] =  \App\Language::getCurrentLanguage();
                    $data['all_languages'] = \App\Language::getAllLanguageRoutes();
                    $data['other_languages'] = $data['all_languages']->reject(function($language) {
                        return $language->code == \App::getLocale();
                    });
                    $data['contact_us'] =  \App\ContactUs::withDescription()->online()->arrange()->get();
                    $data['footer_business'] = \App\Business::withDescription()->online()->arrange()->get();
                    $data['evnet_page'] = \App\EventPage::withDescription()->online()->firstOrFail();
                    $data['setting'] = \App\SystemSetting::withDescription()->firstOrFail();
                    return \Response::view('errors.404',$data,404);
                    break;
    
                case '500':
                    $data['current_language'] =  \App\Language::getCurrentLanguage();
                    $data['all_languages'] = \App\Language::getAllLanguageRoutes();
                    $data['other_languages'] = $data['all_languages']->reject(function($language) {
                        return $language->code == \App::getLocale();
                    });
                    $data['contact_us'] =  \App\ContactUs::withDescription()->online()->arrange()->get();
                    $data['footer_business'] = \App\Business::withDescription()->online()->arrange()->get();
                    $data['evnet_page'] = \App\EventPage::withDescription()->online()->firstOrFail();
                    $data['setting'] = \App\SystemSetting::withDescription()->firstOrFail();
                    return \Response::view('errors.500',$data,500);
                    break;

                case '503':
                    $data['current_language'] =  \App\Language::getCurrentLanguage();
                    $data['all_languages'] = \App\Language::getAllLanguageRoutes();
                    $data['other_languages'] = $data['all_languages']->reject(function($language) {
                        return $language->code == \App::getLocale();
                    });
                    $data['contact_us'] =  \App\ContactUs::withDescription()->online()->arrange()->get();
                    $data['footer_business'] = \App\Business::withDescription()->online()->arrange()->get();
                    $data['evnet_page'] = \App\EventPage::withDescription()->online()->firstOrFail();
                    $data['setting'] = \App\SystemSetting::withDescription()->firstOrFail();
                    return \Response::view('errors.500',$data,500);
                    break;
    
                default:
                    return $this->renderHttpException($exception);
                    break;
            }
        } else {
            return parent::render($request, $exception);
        }
    }
}
