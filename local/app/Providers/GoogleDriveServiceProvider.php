<?php

namespace App\Providers;

use App\GoogledriveAPI;
use Illuminate\Support\ServiceProvider;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use League\Flysystem\Filesystem;
class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend("google", function($app, $config) {
            if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
                            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
            }
            $api = GoogledriveAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first();
            if($api == null){
                return redirect()->route('googledrive.api.create');
            }else{
                $client = new \Google_Client;
                $client->setClientId($api->client_id);
                $client->setClientSecret($api->client_secret);
                $client->refreshToken($api->refresh_token);
                $service = new \Google_Service_Drive($client);
                $adapter = new GoogleDriveAdapter($service, $api->drive_folder_id);
                return new Filesystem($adapter);
            }
        });
    }
}
