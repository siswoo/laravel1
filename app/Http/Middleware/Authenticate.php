<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {   
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization Bearer', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNGMyYWVkNTQ1ZGI0ZWZkMDkzYmMxNzY5NjdiMDU3OTI1Yzg5YjM0N2RhOWRhODVkNGRkZjIzY2I3MWIwYThmNzZlMjkzOGE2MWY4YThkNmMiLCJpYXQiOjE2NjEzMDM1NTkuODQ4NDU0LCJuYmYiOjE2NjEzMDM1NTkuODQ4NDU3LCJleHAiOjE2NjEzMDcxNTkuODQxNjc5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Df24UMT7a-AuOj7-gWw-n7jVke_IaH2iPfCEn5ClJTAOE2cgq_7XmYmLFSfdt4oG9CTiDWiiXQp89KwMYlE3Kzh85LXF6E_Qli1V_sqGGumJXHP5I14PqvB4gU6gdkcVoTp_RV8QG6eyaaAWRcW38PZe8mrNRiqisMpZ55wWcdW_fpj_abUWV7gzAhtC7HY3iUGnA5iEBFupV11-ghhk_9COSGOnCLvR_xRI0G05c58QkDfjsNQNU8yIKa9sLW2TllT5LzwCOutslkk2RdcP2_ZjXqFL9iSBlLbkQynnNML6MXNzNQvsvqt08H60RsSIMCufj7cH83BYZd9FygsOfYKn5ALB5B3CLumIvqQ7qGiex7EjJyiQaIezDQYQAdtqQQAERQP7lvfZ5omxEbKJ9TQF1Sn_XMi8xoy925B5VS9GYisa311cQVPmq6vnasNYGrIPxPpDDbnSNcHXfT7_MMn5c7A0bBeKBKpm90ST3W6PDF4Ou3PnCRl5U2GGl8HNhQM04ESa6ruXDtSRk6-SO4DnJKCmyplJdm5EqlhBi8TWQyhgZaP-k4fcmKd9NP1oVW3I2_2vVk9BCChEDQ37linoWGm2NEmzdn6heUl0T4eFyN9sbd12ZTPCq9Yav8Hw6OsJNJxC1zjz4YlmuP11-cNS28Z7QuQRpY8OFqjXl7w');
        //dd($request);
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
