<?php

namespace App\Http\Controllers;

use App\Models\User;
use Google\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google\Service\Oauth2;
    class GoogleLoginController extends Controller
    {
        public function register(Request $request)
        {
            $user = User::create(([
                'email'=> $request->input('email'),
                'password'=> $request->input('password')
            ]));
            if ($user->exists()){
                return response()->json(['message'=>'user exists']);
            }
            return view('home')->with(['user' => $user, 'authMethod' => 'registration']);
        }
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
            $userEmail = $userInfo->email;
            return view('home')->with(['userEmail' => $userEmail, 'authMethod' => 'google']);
        }

        protected function getClient()
        {
            $client = new Client();
            $client->setClientId(config('services.google.client_id'));
            $client->setClientSecret(config('services.google.client_secret'));
            $client->setRedirectUri('http://localhost:8001/login/callback');
            $client->setIncludeGrantedScopes(true);
            $client->setScopes([
                Oauth2::USERINFO_EMAIL,
                Oauth2::USERINFO_PROFILE,
            ]);
            return $client;
        }
        public function signIn(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return view('home')->with(['userCredentials' => $credentials, 'authMethod' => 'manual']);
            }
            return response()->json(['message'=>'invalid credentials']);
        }
        public function logout()
        {
            $client = new Client();
            $client->revokeToken();
            return redirect('/');
        }
    }
