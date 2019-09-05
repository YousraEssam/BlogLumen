<?php

namespace App\Http\Controllers;

use App\Author;
use App\Transformers\AuthorTransformer;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // You should uncomment the Eloquent $app->withEloquent() call in bootstrap/app.php.
        $authors = Author::all();  
        
        return responder()->success($authors, AuthorTransformer::class)->respond();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'location' => 'required',
        ]);

        $author = Author::create($request->all());
        return $author;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        if($author){
            return responder()->success($author, AuthorTransformer::class)->respond();
        }else{
            return responder()->error('This id doesn\'t exist')->respond();
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        // dd($author);
        return response()->json($author, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $author = Author::findOrFail($id)->delete();
        if($author){
            return response([
                'status' => 410,
                'message' => 'Deleted Successfully'
            ],200);
        }else{
            return response([
                'status' => 204,
                'message' => 'Deletion Failed'
            ],200);  
        }
    }
}
