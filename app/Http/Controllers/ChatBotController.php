<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    public function ask(Request $request)
    {
        $request->validate(['message' => 'required|string']);
        
        $apiKey = trim(env('GEMINI_API_KEY'));

        // 2026 UPDATE: Using the latest stable Gemini 3 Flash preview
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key={$apiKey}";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => "You are 'BookBot', a helpful bookstore assistant. " . $request->message]
                    ]
                ]
            ],
            // Keeping it clean - No extra config fields that can cause "Unknown Name" errors
        ]);

        $data = $response->json();

        // Handle error responses
        if (isset($data['error'])) {
            return response()->json([
                'reply' => 'AI Error: ' . ($data['error']['message'] ?? 'Check API settings')
            ], 500);
        }

        // Extract the reply
        $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? "I'm thinking... but nothing came out. Try again!";

        return response()->json(['reply' => $reply]);
    }
}