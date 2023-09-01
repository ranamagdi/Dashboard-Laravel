<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
        'id'=>$this->id,
        'title in English'=>$this->title_en,
        'title in Arabic'=>$this->title_ar,
        'category image'=>$this->cat_img,
        'description English'=>$this->description_en,
        'description Arabic'=>$this->description_ar,
        'Parent id'=>$this->parent_id


        ];






    }
}
