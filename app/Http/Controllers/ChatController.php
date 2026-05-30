<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatController extends Controller
{
  public function index()
  {
    return view('chat');
  }

  public function preguntar(Request $request)
  {
    $request->validate([
      'mensajes' => 'required|array',
    ]);

    $client = OpenAI::client(env('OPENAI_API_KEY'));

    $response = $client->chat()->create([
      'model' => 'gpt-4o-mini',
      'messages' => $request->mensajes,
    ]);

    $respuestaIA = $response->choices[0]->message->content;

    return response()->json([
      'respuesta' => $respuestaIA,
    ]);
  }
}
