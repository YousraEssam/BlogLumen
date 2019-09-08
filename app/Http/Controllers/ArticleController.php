<?php

namespace App\Http\Controllers;

use App\Transformers\ArticleTransformer;
use App\Article;
use Illuminate\Http\Request;

/**
 * @group Articles management
 *
 * APIs for managing articles
 */

class ArticleController extends Controller
{
    /**
     * List All Articles.
     * 
     * @transformercollection \App\Transformers\ArticleTransformer
     * @authenticated
     */
    public function index(){

        /* USING FRACTAL [TRANSFORMERS] with Flugger */
        $article = Article::paginate();
        if($article){
            return responder()->success($article, ArticleTransformer::class)
                    ->with('Author')
                    ->only(['Author'=>['Name','Email Address','Location']])
                    ->respond();
        }else{
            return responder()->error('No Data Found')->respond();
        }
    }
    /**
     * Create and Store a newly created Article.
     * @transformercollection \App\Transformers\ArticleTransformer
     * @authenticated
     * @bodyParam main_title       string     required The title of the Article.
     * @bodyParam secondary_title  string     required The title of the post.
     * @bodyParam content          string     required The title of the post.
     * @bodyParam image            image      required This is required and must be an image.
     * @bodyParam author_id        int        required The ID of an existing author.
     * 
     */
    public function store(Request $request){
        $this->validate($request, [
            'main_title' => 'required',
            'secondary_title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'author_id' => 'required|integer'
        ]);

        if($request->hasFile('image') || $request['image']){
            
            $imageName = $request->file('image') ?? $request['image'];
            if($imageName){
                $filename = $this->uploadImage($imageName, $request);

                $created_article = Article::create($request->except('image')+['image' => $filename]);

                return responder()
                    ->success($created_article, ArticleTransformer::class)
                    ->with('Author')->only(['Author'=>['Name','Email Address','Location']])
                    ->respond();
            }else{
                return responder()->error('Creation Failed')->respond();
            }
        }else{
                return responder()->error('The uploaded file is not applicable')->respond();
            }
        }
    
    /**
     * Display a specific Article using Article ID.

     * @transformercollection \App\Transformers\ArticleTransformer

     * @authenticated
     */
    public function show($id){

        /* USING FRACTAL [TRANSFORMERS] with Flugger */
        $article = Article::find($id);
        
        if($article){
            return responder()->success($article, ArticleTransformer::class)
                ->with('Author')->only(['Author'=>['Name','Email Address','Location']])->respond();
        }else{
            return responder()->error('This id doesn\'t exist')->respond();
        }
    }

    /**
     * Update a specific Article using Article ID.

     * @transformercollection \App\Transformers\ArticleTransformer

     * @bodyParam main_title       string     required The title of the Article.
     * @bodyParam secondary_title  string     required The title of the post.
     * @bodyParam content          string     required The title of the post.
     * @bodyParam image            image      required This is required and must be an image.
     * @bodyParam author_id        int        required The ID of an existing author.
     * @authenticated
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'main_title' => 'required',
            'secondary_title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'author_id' => 'required|integer'
        ]);

        $article = Article::findOrFail($id);
        
        if($request->hasFile('image') || $request['image']){

            $imageName = $request->file('image') ?? $request['image'];
            if($imageName){
                $filename = $this->uploadImage($imageName, $request);
                $article->update($request->except('image')+['image' => $filename]);
                return responder()->success($article, ArticleTransformer::class)
                    ->with('Author')
                    ->only(['Author'=>['Name','Email Address','Location']])
                    ->respond();     
            }else{
                responder()->error('Update Failed')->respond();
            }
        }else{
            return responder()->error('The uploaded image file is not applicable')->respond();
        }
    }
    /**
     * Remove a specific Article using Article ID [Soft Delete].
     * @transformercollection \App\Transformers\ArticleTransformer
     * @authenticated
     */
    public function softDelete($id){

        $article = Article::findOrFail($id)->delete();
        if($article){
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

     /**
     * Upload Image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * 
     * @bodyParam image    image   required This is required and must be an image.
     * @bodyParam request  object  required The ID of an existing author.
     * @authenticated
     */
    private function uploadImage($imageName, $request){

        $file_original_name = $imageName->getClientOriginalName();
        $filename = pathinfo($file_original_name, PATHINFO_FILENAME) . time() . "." .
                    pathinfo($file_original_name, PATHINFO_EXTENSION);
            
        $request['image']->move('public/images', $filename);
        return $filename;
    }
}