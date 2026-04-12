<?php

namespace App\Http\Controllers;

use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
class ChatController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('viewjs/chat/index', [
            'response' => $request["response"]
        ]); // Renders the Vue component
    }

    public function sendMessage(Request $request)
    {
        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/responses', [
            'model' => 'gpt-4o-mini', //'gpt-5.3',
            'input' => $request["message"],
        ]);

        return redirect()->route('chat.index', [
            'response' => $response['output'][0]['content'][0]['text'] ?? 'No response'
        ]);
        //return Inertia::render('viewjs/chat/index', [
        //    'response' => $response['output'][0]['content'][0]['text'] ?? 'No response'
        //]);
    }

}
