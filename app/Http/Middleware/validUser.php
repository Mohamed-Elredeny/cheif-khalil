<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class validUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('api')->user()) {
            if(auth('api')->user()->active == 0){
                $response = [
                    'status' => false,
                    'code'=>423,
                    'message' => 'Verify your mobile Verify code page ',
                ];
                return response()->json($response, 423);
            }else{
                if(auth('api')->user()->package_id == null){
                    $response = [
                        'status' => false,
                        'code'=>424,
                        'message' => 'End Date Subscription Subscribe Page no pacakge yet',
                    ];
                    return response()->json($response, 424);
                }else{
                    if(date_format(date_create(auth('api')->user()->endDateSubscripe), 'y-m-d') < date('y-m-d')  ){
                        $response = [
                            'status' => false,
                            'code'=>424,
                            'message' => 'End Date Subscription Subscribe Page' .  ' '.date_format(date_create(auth('api')->user()->endDateSubscripe),'d-m-y') . ' '.  date('d-m-y')
                        ];
                        return response()->json($response, 424);
                    }
                }

            }
        }
        return $next($request);

    }
}
