<?php

namespace App\Http\Controllers\Api\PodCast;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;

class PodCastApiController extends Controller
{
    // retorna todos os podcasts cadastrados
    public function getPodcasts() {
        return response()->json(PodCast::all(), 200);
    }

    // retorna um podcast específico pelo request
    public function getPodcast(Request $request) {
        $podcast = Podcast::find($request->id_podcast);
        if($podcast) {
            return response()->json($podcast, 200);
        } else {
            return response()->json(['message' => 'Podcast não encontrado'], 404);
        }
    }
}
 