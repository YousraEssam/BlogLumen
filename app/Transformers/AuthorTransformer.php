<?php

namespace App\Transformers;

use App\Author;
use Flugg\Responder\Transformers\Transformer;

class AuthorTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Author $author
     * @return array
     */
    public function transform(Author $author)
    {
        return [
            'ID' => $author->id,
            'Name' => $author->name,
            'Email Address' => $author->email,
            'GitHub Account' => $author->Github,
            'Twitter Account' => $author->twitter,
            'Location' => $author->location,
        ];
    }
}
