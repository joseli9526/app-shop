<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static $messages = [
    'name.required' => 'Es necesario un nombre para la categoria.',
    'name.min' => 'El nombre de la categoria debe tener al menos 3 caracteres.',
    'description.max' => 'La descripción corta solo admite hasta 250 caracteres.',

    ];

    public static $rules = [
    'name' => 'required|min:3',
    'description' => 'max:250'
    ];

    protected $fillable = ['name', 'description'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute(){
        if ($this->image)
            return '/images/categories/'.$this->image;

        // else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;

        return '/images/defaul_product.png';
    }
}
