<?php

namespace App\Http\Controllers;

use App\GameDB;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\GameResource;
use App\ImageService;
use App\Models\Game;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $games=Game::all();
        return $this->sendSuccess(GameResource::collection($games), ' games retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        $game = GameDB::store($request->validated());
      
        return $this->sendSuccess(new GameResource($game), 'game added successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return $this->sendSuccess(new GameResource($game), 'game found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game=GameDB::update($game,$request->validated());

        return $this->sendSuccess(new GameResource($game), 'game updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        ImageService::delete($game,"game");
        return $this->sendSuccess(null,'game deleted successfully');

    }
}
