<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Drive;
use Illuminate\Http\Request;

class GoogleDriveController extends Controller {
    private function client(): Client {
        $client = new Client;
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_DRIVE_REDIRECT_URI'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setScopes([Drive::DRIVE_FILE,]);
        return $client;
    }

    public function redirect() {
        $client = $this->client();
        return redirect()->away($client->createAuthUrl());
    }

    public function callback(Request $request) {
        if (!$request->filled('code')) {
            return response()->json([
                'error' => 'Authorization code tidak ditemukan.',
            ], 400);
        }
        $client = $this->client();
        $token = $client->fetchAccessTokenWithAuthCode($request->code);
        if (isset($token['token'])) {
            return response()->json($token, 400);
        }

        return response()->json([
            'message' => 'OAuth berhasil.',
            'refresh_token' => $token['refresh_token'] ?? null,
            'access_token' => $token['access_token'] ?? null,
            'expires_in' => $token['expires_in'] ?? null,
        ]);
    }
}