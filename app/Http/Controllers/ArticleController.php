<?php

namespace App\Http\Controllers;

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
            'image' => 'required|image',
            'author_id' => 'required|integer'
        ]);

        // $new_article = Article::create($request->all());
        // if($new_article){
        //     return responder()->success($new_article, ArticleTransformer::class)
        //         ->with('Author')->only(['Author'=>['Name','Email Address','Location']])->respond();
        // }else{
        //     return responder()->error('Creation Failed')->respond();
        // }
        if($request->hasFile('image') || $request['image']){

            $imageName = $request->file('image') ?? $request['image'];
            if($imageName){
                $filename = $this->uploadImage($imageName, $request);
                return Article::create($request->except('image')+['image' => $filename]);
            }else{
                return responder()->error('The uploaded file is not applicable');
            }
        }
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
            'image' => 'required|image',
            'author_id' => 'required|integer'
        ]);

        $article = Article::findOrFail($id);
        
        if($request->hasFile('image') || $request['image']){

            $imageName = $request->file('image') ?? $request['image'];

            $filename = $this->uploadImage($imageName, $request);
            $article->update($request->except('image')+['image' => $filename]);
            // return $article;
            return responder()->success($article, ArticleTransformer::class)
                ->with('Author')->only(['Author'=>['Name','Email Address','Location']])->respond();
                
        }else{
            return responder()->error('The uploaded image file is not applicable')->respond();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id){

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

    private function uploadImage($imageName, $request){

        $file_original_name = $imageName->getClientOriginalName();
        $filename = pathinfo($file_original_name, PATHINFO_FILENAME) . time() . "." .
                    pathinfo($file_original_name, PATHINFO_EXTENSION);
            
        $request['image']->move('images', $filename);
        
        return $filename;
    }
}