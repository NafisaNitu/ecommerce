<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected static $subcategory;

    public static function saveData($request)
    {

        self::$subcategory = new SubCategory();
        self::$subcategory->title       = $request->title;
        self::$subcategory->cat_id = $request->cat_id;
        self::$subcategory->description     = $request->description;
        self::$subcategory->status      = $request->status;
        self::$subcategory->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');  //ORM table relationship
    }

    public static function updateData($request,$id)
    {
        self::$subcategory = SubCategory::find($id);

        self::$subcategory->title       = $request->title;
        self::$subcategory->cat_id      = $request->cat_id;
        self::$subcategory->description = $request->description;
        self::$subcategory->status      = $request->status;
        self::$subcategory->save();
    }


}
