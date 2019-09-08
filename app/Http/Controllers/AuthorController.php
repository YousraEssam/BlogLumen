<?php

namespace App\Http\Controllers;

use App\Author;
use App\Transformers\AuthorTransformer;
use Illuminate\Http\Request;

/**
 * @group Authors management
 *
 * APIs for managing authors
 */

class AuthorController extends Controller
{
    /**
     * List All Authors.
     * @transformercollection \App\Transformers\AuthorTransformer
     * @authenticated
     */
    public function index()
    {
        // You should uncomment the Eloquent $app->withEloquent() call in bootstrap/app.php.
        $authors = Author::all();  
        
        return responder()->success($authors, AuthorTransformer::class)->respond();
    }
    /**
     * Create and Store a newly created Author.
     * @transformercollection \App\Transformers\AuthorTransformer
     * @bodyParam name       string     required The name of the author.
     * @bodyParam email      email      required The email of the author.
     * @bodyParam password   string     required The password of the author.
     * @bodyParam location   string     required The location of the author.
     * @authenticated
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'location' => 'required',
        ]);

        $hashedPass = app('hash')->make($request->password);
        $request['password'] = $hashedPass;
        
        $created_author = Author::create($request->all());
        
        if($created_author){
            return responder()
                ->success($created_author, AuthorTransformer::class)
                ->respond();
        }else{
            return responder()->error('Creation Failed')->respond();
        }
    }

    /**
     * Display a specific Author using Author ID.
     * @transformercollection \App\Transformers\AuthorTransformer
     * @authenticated
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
     * Update a specific Author using Author ID.
     * @transformercollection \App\Transformers\AuthorTransformer
     * @bodyParam name       string     required The name of the author.
     * @bodyParam email      email     required The email of the author.
     * @bodyParam password   string     required The password of the author.
     * @bodyParam location   string     required The location of the author.
     * @authenticated
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        if($author){
                return responder()->success($author, AuthorTransformer::class)
                ->with('Author')->only(['Author'=>['Name','Email Address','Location']])->respond();     
        }else{
            responder()->error('Update Failed')->respond();
        }
    }

    /**
     * Remove a specific Author using Author ID.
     * @authenticated
     */
    public function softDelete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        if($author){
            return response()->json(['message' => 'Deleted Successfully'], 200);
        }else{
            responder()->error('Delete Failed')->respond();
        }
    }
}
