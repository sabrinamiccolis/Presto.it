<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use Favoriteable;
    use Searchable;

    use HasFactory;
    protected $fillable = ['title', 'body', 'price', 'category_id', 'revised'];

    public function toSearchableArray() {
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $category,
        ];
        return $array;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value) {
        $this->revised = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount() {
        return Announcement::where('revised', null)->count();
    }

    public function images () {
        return $this->hasMany(Image::class);
    }

}
