<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;
use Illuminate\Http\UploadedFile;

class GoogleDriveService
{
    protected Client $client;

    protected Drive $drive;

    public function __construct()
    {
        $this->client = new Client;

        $this->client->setClientId(
            env('GOOGLE_DRIVE_CLIENT_ID')
        );

        $this->client->setClientSecret(
            env('GOOGLE_DRIVE_CLIENT_SECRET')
        );

        $this->client->setAccessType('offline');

        $this->client->setScopes([
            Drive::DRIVE_FILE,
        ]);

        $refreshToken = env('GOOGLE_REFRESH_TOKEN');

        if (! $refreshToken) {
            throw new \RuntimeException(
                'GOOGLE_REFRESH_TOKEN belum tersedia.'
            );
        }

        $token = $this->client->fetchAccessTokenWithRefreshToken(
            $refreshToken
        );

        if (isset($token['error'])) {
            throw new \RuntimeException(
                'Gagal mendapatkan access token Google: '.
                ($token['error_description'] ?? $token['error'])
            );
        }

        if (! $this->client->getAccessToken()) {
            throw new \RuntimeException(
                'Access token Google tidak berhasil diperoleh.'
            );
        }

        $this->drive = new Drive($this->client);
    }

    public function client()
    {
        return $this->client;
    }

    public function drive()
    {
        return $this->drive;
    }

    public function upload(UploadedFile $file, string $folderId)
    {
        $metadata = new DriveFile([
            'name' => time().'_'.$file->getClientOriginalName(),
            'parents' => [
                $folderId,
            ],
        ]);

        $uploaded = $this->drive->files->create(
            $metadata,
            [
                'data' => file_get_contents($file->getRealPath()),
                'mimeType' => $file->getMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id',
            ]
        );

        $this->makePublic($uploaded->getId());

        return $this->getFile($uploaded->getId());
    }

    public function makePublic(string $fileId): void
    {
        $permission = new Permission([
            'type' => 'anyone',
            'role' => 'reader',
        ]);

        $this->drive->permissions->create(
            $fileId,
            $permission
        );
    }

    public function getFile(string $fileId)
    {
        return $this->drive->files->get(
            $fileId,
            [
                'fields' => 'id,name,webViewLink,webContentLink,size,mimeType',
            ]
        );
    }

    public function delete(string $fileId): bool
    {
        try {
            $this->drive->files->delete($fileId);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
