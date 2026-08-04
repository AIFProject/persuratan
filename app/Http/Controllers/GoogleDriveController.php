<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleDriveService;

class GoogleDriveController extends Controller
{
    protected GoogleDriveService $google;
    public function __construct(GoogleDriveService $google) {
        $this->google = $google;
    }
    public function redirect() {
        return redirect (
            $this->google->client()->createAuthUrl()
        );
    }
    public function callback() {
        $client = $this->google->client();
        $token = $client->fetchAccessTokenWithAuthCode(
            request('code')
        );
        if (isset($token['error'])) {
            return $token;
        }
        dd($token);
    }
    
}
