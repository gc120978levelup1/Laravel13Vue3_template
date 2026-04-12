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
        return Inertia::render('viewjs/chat/index',['response' => $request["message"]]); // Renders the Vue component
    }

    public function sendMessage(Request $request)
    {

        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/responses', [
                'model' => 'gpt-5.3',
                'input' => $request["message"],
            ]);

        //return response()->json([
        //    'reply' => $response['output'][0]['content'][0]['text'] ?? 'No response'
        //]);


        //return redirect()->route(
        //    'chat.index',[
        //        'response' => $request["message"]//$response['output'][0]['content'][0]['text'] ?? 'No response'
        //    ]
        //);
        return response()->json([
            'response' => $response
        ]);
    }

}
