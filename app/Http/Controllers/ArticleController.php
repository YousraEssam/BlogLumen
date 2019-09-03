<?php

namespace App\Http\Controllers;

use League\Fractal\Manager;
use App\Transformers\ArticleTransformer;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        /* USING FRACTAL [TRANSFORMERS] with Flugger */
        $article = Article::paginate(2);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'main_title' => 'required',
            'secondary_title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'author_id' => 'required|integer'
        ]);

        // $new_article = Article::create($request->all());
        // if($new_article){
        //     return responder()->success($new_article, ArticleTransformer::class)
        //         ->with('Author')->only(['Author'=>['Name','Email Address','Location']])->respond();
        // }else{
        //     return responder()->error('Creation Failed')->respond();
        // }
        if($request->hasFile('image')){

            $imageName = $request->file('image');
            
            $file_original_name = $imageName->getClientOriginalName();

            $filename = pathinfo($file_original_name, PATHINFO_FILENAME).".".pathinfo($file_original_name, PATHINFO_EXTENSION).time();

            $request->image->move('images', $file_original_name);

            // $uploadedImage = uploadImage($imageName, $request);

            // dd($uploadedImage);

            // if($imageName){
            //     $uploadedImage = uploadImage($imageName, $request);

            //     dd($uploadedImage);

            //     if($uploadedImage){
            //         return;
            //     }else{
            //         return responder()->error('Image Upload Failed')->respond();
            //     }
            // }else{
            //     return responder()->error('The uploaded file is not applicable');
            // }
        }
        $request->image = $filename;

        return Article::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'main_title' => 'required',
            'secondary_title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|integer'
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());
        return $article;
        // if($article){
        //     return responder()->success($article, ArticleTransformer::class)
        //         ->with('Author')->only(['Author'=>['Name','Email Address','Location']])->respond();
        // }else{
        //     return responder()->error('Update Failed')->respond();
        // }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $article = Article::findOrFail($id)->delete();
        if($article){
            return response([
                'status' => 410,
                'message' => 'Deleted Successfully'
            ],202);
        }else{
            return response([
                'status' => 204,
                'message' => 'Deletion Failed'
            ],202);  
        }
    }

    // function uploadImage($imageName, Request $request){

    //     $file_original_name = $imageName->getClientOriginalName();
    //     dd($file_original_name);

    //     $filename = pathinfo($file_original_name, getPathInfo()) . "." .pathinfo($file_original_name, getClientOriginalExtension());
    //     dd($filename);

    //     $request->image->move(public_path('images'), $file_original_name);

    //     return $filename;
    // }
}