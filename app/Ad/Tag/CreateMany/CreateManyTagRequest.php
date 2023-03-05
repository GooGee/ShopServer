<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateMany;


use App\Ad\Tag\CreateOne\CreateOneTagRequest;

class CreateManyTagRequest extends CreateOneTagRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::getRulezzForItemzz();
    }
}