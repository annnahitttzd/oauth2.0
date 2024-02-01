<?php

namespace App\Http\Controllers;

use Google\Client;
use Illuminate\Http\Request;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        $client = $this->getClient();
        $url = $client->createAuthUrl();
        return redirect()->away($url);
    }

    public function handleGoogleCallback()
    {
        $request = request()->all();

        $client = $this->getClient();
        $tokenInfo = $client->fetchAccessTokenWithAuthCode($request['code']);
        $token = $tokenInfo['access_token'];

        $client->setAccessToken($token);

        $oauth2 = new \Google\Service\Oauth2($client);
        $userInfo = $oauth2->userinfo->get();
        return redirect('/home');
    }

    protected function getClient()
    {
        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri('http://localhost:8001/login/callback');
        $client->setIncludeGrantedScopes(true);
        $client->setScopes([
            \Google\Service\Oauth2::USERINFO_EMAIL,
            \Google\Service\Oauth2::USERINFO_PROFILE,
        ]);
        return $client;
    }
    public function logout()
    {
        $client = new Client();
        $client->revokeToken();
        return redirect('/');
    }
}
