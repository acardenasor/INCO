<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use App\Models\Influencer;
use App\Models\CommentEtoI;
use App\Models\CommentItoE;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createCommentItoE(Request $request)
    {
        $sender = $request->sender;
        $receiver = $request->receiver;
        $comment = $request->comment;
        $score = $request->score;

        if (is_null($comment) || is_null($receiver) || is_null($sender) || is_null($score)) {
            return response()->json(['response' => 'It is necessary to fill in all the fields'], 400);
        }

        $influencer = Influencer::where('id', $sender)->first();
        $entrepreneur = entrepreneur::where('id', $receiver)->first();

        if (is_null($influencer)) {
            return response()->json(['response' => 'Influencer does not exist'], 400);
        }

        if (is_null($entrepreneur)) {
            return response()->json(['response' => 'Entrepreneur does not exist'], 400);
        }

        CommentItoE::create([
            'sender' => $sender,
            'receiver' => $receiver,
            'description' => $comment,
            'score' => $score,
        ]);
        return response()->json(['response' => 'Comment has been created!'], 201);
    }

    public function createCommentEtoI(Request $request)
    {
        $sender = $request->sender;
        $receiver = $request->receiver;
        $comment = $request->comment;
        $score = $request->score;

        if (is_null($comment) || is_null($receiver) || is_null($sender) || is_null($score)) {
            return response()->json(['response' => 'It is necessary to fill in all the fields'], 400);
        }

        $influencer = Influencer::where('id', $receiver)->first();
        $entrepreneur = entrepreneur::where('id', $sender)->first();

        if (is_null($entrepreneur)) {
            return response()->json(['response' => 'Entrepreneur does not exist'], 400);
        }

        if (is_null($influencer)) {
            return response()->json(['response' => 'Influencer does not exist'], 400);
        }

        CommentEtoI::create([
            'sender' => $sender,
            'receiver' => $receiver,
            'description' => $comment,
            'score' => $score,
        ]);
        return response()->json(['response' => 'Comment has been created!'], 201);
    }
}
