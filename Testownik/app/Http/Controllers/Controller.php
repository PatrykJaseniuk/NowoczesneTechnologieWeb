<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CzyToNauczyciel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $arg1, $arg2, $arg3,$arg4, $method='get';
    protected $middle;
    public function routeGet($arg1=null, $arg2=null, $arg3=null, $arg4=null)
    {
        $args='';
        if($arg1!=null)
        {
            $args = $args.'/'.$arg1;
            if($arg2!=null)
            {
                $args = $args.'/'.$arg2;
                if($arg3!=null)
                {
                    $args = $args.'/'.$arg3;
                    if($arg4!=null)
                    {
                        $args = $args.'/'.$arg4;
                     }
                }

            }
        }
        return '/'.(new \ReflectionClass($this))->getShortName().$args;
    }

    public function routeSet()
    {
        $args='';
        if($this->arg1!=null)
        {
            $args = '/{'.$this->arg1.'}';

            if($this->arg2!=null)
            {
                $args = $args.'/{'.$this->arg2.'}';
                if($this->arg3!=null)
                {
                    $args = $args.'/{'.$this->arg3.'}';
                    if($this->arg4!=null)
                    {
                        $args = $args.'/{'.$this->arg4.'}';
                    }
                }
            }
        }
        $nazwaMetody = $this->method;
        $route = Route::$nazwaMetody(((new \ReflectionClass($this))->getShortName()).$args,
        [get_class($this),'dzialaj']);

        if($this->middle!=null)
        {
            $route->middleware($this->middle);
        }
    }
}
