<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $cards = Card::all();
        return view('card.index',compact('cards'));
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
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        $cards = new Card();
        $title =  $request->title;
        $cards->title = $request->title;
        $cards->slug = Str::slug($title);
        $cards->category = $request->category;
        $cards->description = $request->description;
        $cards->excert = Str::words($request->description,15," ...");
        $cards->user_id = Auth::id();
        $cards->save();

        return to_route('card.index')->with('status', $title.' created sucessfully');
        // return to_route('card.index',compact('cards'))->with('status','Card created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return view('card.show',compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('card.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardRequest  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        if(Gate::denies('update',$card)){
            return abort(404);
        };

        $title =  $request->title;
        $card->title = $request->title;
        $card->slug = Str::slug($title);
        $card->category = $request->category;
        $card->description = $request->description;
        $card->excert = Str::words($request->description,15," ...");
        $card->user_id = Auth::id();
        $card->update();

        return to_route('card.index')->with('status', $title.' updated sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return to_route('card.index')->with('status',"Card Deleted successfully");
    }
}
