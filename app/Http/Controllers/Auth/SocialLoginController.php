<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SocialLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['social', 'guest']);
    }
    
    
    public function redirect($service, Request $request)
    {
        return Socialite::driver($service)->redirect('/home');
    }
    
    public function callback($service, Request $request)
    {
        
        $serviceUser = Socialite::driver($service)->user();
        
        $user = $this->getExistingUser($serviceUser, $service);
        
        if(!$user) {
            $user = User::create([
                'name' => $serviceUser->getName(),
                'email' => $serviceUser->getEmail(),
                
            ]);
        }
        
        if($this->needsSocial($user, $service)) {
            $user->social()->create([
                'social_id' => $serviceUser->getId(),
                'service' => $service,
            ]);
        }
        
        Auth::login($user, false);
        
        return redirect('/home');
    }
    
    protected function needsSocial(User $user, $service)
    {
        return !$user->hasSocialLinked($service);
    }
    
    protected function getExistingUser($serviceUser, $service)
    {
        return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function($q) use ($serviceUser, $service) {
            $q->where('social_id', $serviceUser->getId())->where('service', $service);
        })->first();
    }
}
