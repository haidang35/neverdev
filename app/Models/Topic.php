<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topics';
    protected $fillable = [
        'parent_id', 'slug', 'name', 'desc', 'thumbnail', 'meta_title', 'meta_desc', 'meta_key', 'border_color', 'status'
    ];

    private function generateSlug($name)
    {
        $slug = '';
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }

        return $slug;
    }    

    public function getThumbnail()
    {
        return URL::to('/').$this->thumbnail ?? 'userfiles/images/coding_logo.png';
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function isPublished()
    {
        return $this->status == 1;
    }
}
