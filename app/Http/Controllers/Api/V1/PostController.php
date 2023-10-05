<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = $request->user()->posts;

        return response()->json([
            'data' => $post,
            'status' => 'success',
            'message' => 'Post List'
        ], 200);
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
        $user = $request->user();


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            response()->json(
                [
                    'status' => 'fail',
                    'message' => $validator->errors()
                ],
                422
            );
        }

        $post = Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $user->id,
        ]);

        if ($post) {
            return response()->json([
                'data' => $post,
                'message' => 'Post',
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'data' => [],
            'message' => 'Error',
            'status' => 'fail'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 'fail',
                    'message' => $validator->errors()
                ],
                422
            );
        }

        $post = Post::where('user_id', $request->user()->id)->where('id', $id)->first();

        if (!$post) {
            return response()->json(
                [
                    'data' => [],
                    'status' => 'fail',
                    'message' => 'Not Found'
                ],
                404
            );
        }

        $post->update(['title' => $request->input('title')]);

        return response()->json([
            'data' => $post,
            'message' => 'Post',
            'status' => 'update success'
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
