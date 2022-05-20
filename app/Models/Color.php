<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected static $color;

    public static function saveData($request)
    {
        $colors = explode(',',$request->color);
        self::$color = new Color();
        self::$color->color          = json_encode($colors);
        self::$color->status         = $request->status;
        self::$color->save();
    }

    public static function updateData($request,$id)
    {
        $colors = explode(',',$request->color);
        self::$color = Color::find($id);

        self::$color->color           = json_encode($colors);
        self::$color->status         = $request->status;
        self::$color->save();
    }
}
