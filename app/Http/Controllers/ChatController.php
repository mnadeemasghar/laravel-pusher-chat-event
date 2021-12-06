<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\User;
use App\Providers\ChatMessageSent;
use App\Providers\LoginHistory;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_message = chat::create([
            'to_user_id' => $request->to_user_id,
            'from_user_id' => $request->from_user_id,
            'from_user_name' => User::where('id',$request->from_user_id)->first()->value('name'),
            'message' => $request->message,
        ]);

        $new_message->from_user_id = 123;
        // $new_message->from_user_id = User::where('id',$request->from_user_id)->first()->value('name');

        event(new ChatMessageSent($new_message));
        // event(new ChatMessageSent($new_message['username']));

        return $new_message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(chat $chat)
    {
        //
    }
}
