<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Log;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // specify which methods need login and which not need.
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Log::info('store');
        Log::info($request);


        $attributes = $request->validate([
            'comment' => 'required|string',
        ]);

        $attributes['lead_id'] = $request->lead_id;
        $attributes['added_by'] = auth()->user()->id;


        Log::info($attributes);


        Comment::create($attributes);

//
//
//
////        $comment_id = Comment::insertGetId($attributes);
//
//
//
//        $comment_id = Comment::where('comment', $attributes['comment'])->where('lead_id', $attributes['lead_id'])->where('added_by', $attributes['added_by'])->pluck('id')->first();
//
//
//        $attributes['id'] = $comment_id;
//
//        $attributes['comment_text'] = $attributes['comment'];
//
//        $attributes['user_name'] = auth()->user()->name;
//
//        $attributes['time'] = Comment::findOrFail($comment_id)->created_at->diffForHumans();


        Session::flash('success', 'Successfully add new comment');
        session()->flash('flash_icon', 'success');
        session()->flash('flash_message', 'Comment posted successfully');
        return response()->json(['status' => 'success', 'new_comment' => $attributes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        Session::flash('success', 'Comment deleted successfully');
        session()->flash('flash_icon', 'success');
        session()->flash('flash_message', 'Comment deleted successfully');
        return response()->json(['status' => 'success']);
    }
}
