<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Game;

class IGDBService
{
    protected $client;
    protected $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = env('IGDB_API_URL');
    }

    /**
     * Ottieni la lista dei giochi da IGDB e salva nel database.
     */
    public function getAndSaveGames()
    {
        $response = $this->client->request('POST', $this->apiUrl, [
            'headers' => [
                'Client-ID' => env('IGDB_API_CLIENT_ID'),
                'Authorization' => 'Bearer ' . 'nyve1b3rmwii2it3klm5kqm82vzhsd',  // Usa il token ottenuto
                'Accept' => 'application/json',
            ],
            
            'verify' => false,  // Disabilita la verifica SSL (solo per sviluppo!)
        ]);

        $games = json_decode($response->getBody()->getContents(), true);

        dd($games);

        // Salva i giochi nel database
        // foreach ($games as $gameData) {
        //     Game::create([
        //         'name' => $gameData['name'],
        //         // 'cover_url' => $gameData['cover']['url'] ?? null,
        //         // 'description' => $gameData['description'] ?? null,
        //         // 'release_date' => isset($gameData['release_dates'][0]) ? $gameData['release_dates'][0]['date'] : null,
        //         // 'genres' => $gameData['genres'] ?? [],
        //         // 'platforms' => $gameData['platforms'] ?? [],
        //         // 'rating' => $gameData['rating'] ?? null,
        //     ]);
        // }
    }
}