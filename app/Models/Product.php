<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected static $product;
    protected static $image;
    protected static $imageName;
    protected static $directory;
    protected static $imageUrl;

    public static function saveData($request)
    {
        self::$image = array();
        if ($files = $request->file('image'))
        {
            foreach ($files as $file)
            {
                self::$imageName = time().rand(10,1000).'.'.$file->getClientOriginalExtension();
                self::$directory = 'admin-assets/assets/images/product/';
                $file->move(self::$directory, self::$imageName);
                self::$imageUrl = self::$directory.self::$imageName;
                self::$image[] = self::$imageUrl;
            }
        }


        self::$product = new Product();
        self::$product->cat_id         = $request->category;
        self::$product->subcat_id      = $request->subcategory;
        self::$product->br_id          = $request->brand;
        self::$product->unit_id        = $request->unit;
        self::$product->size_id        = $request->size;
        self::$product->color_id       = $request->color;
        self::$product->code           = $request->code;
        self::$product->name           = $request->name;
        self::$product->description    = $request->description;
        self::$product->price          = $request->price;
        self::$product->image          = implode('|', self::$image);
//        self::$product->image          = self::$imageUrl;
        self::$product->status         = $request->status;
        self::$product->save();
    }

    public static function updateData($request,$id)
    {
        self::$product = Product::find($id);
        self::$image = array();
        $files = $request->file('image');
        if ($files= $request->file('image'))
        {
            if(file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }

            foreach ($files as $file)
            {
                self::$imageName = time().rand(10,1000).'.'.$file->getClientOriginalExtension();
                self::$directory = 'admin-assets/assets/images/product/';
                $file->move(self::$directory, self::$imageName);
                self::$imageUrl = self::$directory.self::$imageName;
                self::$image[] = self::$imageUrl;
            }
        } else {
            self::$imageUrl = self::$product->image;
            self::$image[] = self::$imageUrl;
        }

        self::$product->cat_id         = $request->category;
        self::$product->subcat_id      = $request->subcategory;
        self::$product->br_id          = $request->brand;
        self::$product->unit_id        = $request->unit;
        self::$product->size_id        = $request->size;
        self::$product->color_id       = $request->color;
//        self::$product->color_id        = (BigInteger)Json_encode($color);
        self::$product->code           = $request->code;
        self::$product->name           = $request->name;
        self::$product->description    = $request->description;
        self::$product->price          = $request->price;
        self::$product->image          = implode('|', self::$image);
//        self::$product->image          = self::$imageUrl;
        self::$product->status         = $request->status;
        self::$product->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');  //ORM table relationship
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'br_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public static function catProductCount($cat_id)
    {
        $catCount = Product::where('cat_id', $cat_id)->where('status', 1)->count();
        return $catCount;
    }

    public static function subcatProductCount($subcat_id)
    {
        $subcatCount = Product::where('subcat_id', $subcat_id)->where('status', 1)->count();
        return $subcatCount;
    }

    public static function brandProductCount($br_id)
    {
        $brandCount = Product::where('br_id', $br_id)->where('status', 1)->count();
        return $brandCount;
    }


}
