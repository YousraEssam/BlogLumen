<?php

namespace App\Transformers;

use App\Article;
use Flugg\Responder\Transformers\Transformer;

class ArticleTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'Author' => AuthorTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Article $article
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'ID' => $article->id,
            'Main title' => $article->main_title,
            'Secondary Title' => $article->secondary_title,
            'Content' => $article->content,
            'Image' => $article->image,
            'Author' => $article->author,
        ];
    }
}
