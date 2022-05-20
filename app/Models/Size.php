<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected static $size;

    public static function saveData($request)
    {
        $sizes = explode(',',$request->size);
        self::$size = new Size();
        self::$size->size           = json_encode($sizes);
        self::$size->status         = $request->status;
        self::$size->save();
    }

    public static function updateData($request,$id)
    {
        $sizes = explode(',',$request->size);
        self::$size = Size::find($id);

        self::$size->size           = json_encode($sizes);
        self::$size->status         = $request->status;
        self::$size->save();
    }
}
