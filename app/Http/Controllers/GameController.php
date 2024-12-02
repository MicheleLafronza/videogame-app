<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected $igdbService;

    public function __construct(IGDBService $igdbService)
    {
        $this->igdbService = $igdbService;
    }

    /**
     * Ottieni i giochi da IGDB e salvali nel database.
     */
    public function saveGames()
    {
        $this->igdbService->getAndSaveGames();

        return response()->json(['message' => 'Games saved successfully!']);
    }
}
