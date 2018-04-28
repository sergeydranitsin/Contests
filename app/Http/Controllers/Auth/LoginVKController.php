<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;


class LoginVKController extends Controller
{
    /**
     * Redirect the user to the VK authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    /**
     * Obtain the user information from VK.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('vkontakte')->user();

        $id = 'vk_' . $user->id;
        $u = User::where('social_id', $id)->first();

        if ($u) {
            Auth::login($u);
        } else {
            $u = User::create([
//                'name' => $user->name,
                'email' => $user->email,
                'first_name' => $user->user['first_name'],
                'second_name' => $user->user['last_name'],
                'moderator' => 0,
                'social_id' => $id,
                'image' => $user->avatar,
            ]);
            Auth::login($u);
        }
        return redirect('/');
    }
}
