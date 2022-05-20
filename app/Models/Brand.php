<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected static $brand;

    public static function saveData($request)
    {
        self::$brand = new Brand();
        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        self::$brand->status         = $request->status;
        self::$brand->save();
    }

    public static function updateData($request,$id)
    {
        self::$brand = Brand::find($id);

        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        self::$brand->status         = $request->status;
        self::$brand->save();
    }
}
