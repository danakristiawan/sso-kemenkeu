<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SsoController extends Controller
{
    public function sso()
    {
        return redirect(config('sso.base_uri').config('sso.authorize')['endpoint'].'?grant_type='.config('sso.authorize')['grant_type'].'&response_type='.config('sso.authorize')['response_type'].'&client_id='.config('sso.authorize')['client_id'].'&scope='.config('sso.authorize')['scope'].'&nonce='.  config('sso.authorize')['nonce'].'state='.config('sso.authorize')['state'].'&redirect_uri='.config('sso.authorize')['redirect_uri']);
    }

    public function connect(Request $request)
    {
        Session::regenerate();

        if ($request->code) {
            $responseCode = Http::asForm()->post(config('sso.base_uri').config('sso.token')['endpoint'],[
                'client_id' => config('sso.authorize')['client_id'],
                'grant_type' => config('sso.authorize')['grant_type'],
                'client_secret' => config('sso.token')['client_secret'],
                'code' => $request->code,
                'redirect_uri' => config('sso.authorize')['redirect_uri']
            ]);

            $token =  json_decode($responseCode->getBody()->getContents(), true);

            if(!isset($token['access_token'])) {
                return redirect('/sso');
            }

            if ($token['access_token']) {
                $responseToken = Http::asForm()->post(config('sso.base_uri').config('sso.userinfo')['endpoint'],[
                    'access_token' => $token['access_token']
                ]);

                    if ($responseToken) {
                        $userInfo =  json_decode($responseToken->getBody()->getContents(), true);
                        $user = User::where('nip', $userInfo['nip'])->first();

                        if(isset($user->id)) {
                            Auth::loginUsingId($user->id);
                            Session::regenerate();
                            Session::put('userInfo', $userInfo);
                            return redirect()->intended('/home');

                        } else {
                            redirect('/')->with('gagal','User belum terdaftar');}

                    } else {
                    redirect('/')->with('gagal','Request Error');}

            } else {
                redirect('/')->with('gagal','Request Error');}

        } else {
            redirect('/')->with('gagal','Request Error');}
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        Session::invalidate();
    
        Session::regenerateToken();

        $uri = config('sso.base_uri') . config('sso.endsession.endpoint');
        $id_token = Session::get('id_token');
        $post_logout_redirect_uri = config('sso.authorize.redirect_uri');
        $state = config('sso.authorize.state');
        $endsession_url = $uri . '?id_token_hint=' . $id_token . '&post_logout_redirect_uri=' . $post_logout_redirect_uri . '&state=' . $state;

        return redirect($endsession_url);
    }
}
