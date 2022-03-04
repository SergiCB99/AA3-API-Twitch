<?php

namespace Database\Seeders;

use App\Models\Dada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $twitch_client_id = env('CLIENT_ID');
        $twitch_client_secret = env('CLIENT_SECRET');
        $twitch_scopes = '';

        $helixGuzzleClient = new \TwitchApi\HelixGuzzleClient($twitch_client_id);
        $twitchApi = new \TwitchApi\TwitchApi($helixGuzzleClient, $twitch_client_id, $twitch_client_secret);
        $oauth = $twitchApi->getOauthApi();

        try {
            $token = $oauth->getAppAccessToken($twitch_scopes ?? '');
            $data = json_decode($token->getBody()->getContents());

            // Your bearer token
            $twitch_access_token = $data->access_token ?? null;
        } catch (Exception $e) {
            echo "Exception";
        }

        //var_dump($data);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.twitch.tv/helix/streams",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer ". $data->access_token,
                "Client-Id: ".env('CLIENT_ID')
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        $json = json_decode($response);

        var_dump($json);

        foreach ($json->data as $streamer) {

            Dada::create([
                'nombre' =>$streamer->user_login,
            ]);

        }
    }
}
