<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogTranslation extends Model
{
    use HasFactory;
    protected $table = 'blog_translations';
    protected $fillable = [
        'slug', 'author_id', 'blog_id', 'title', 'body', 'locale',
        'meta_title', 'meta_desc', 'meta_key', 'description'
    ];

    protected static function boot()
    {
        parent::boot();

        // static::created(function ($blog) {
        //     $blog->slug = $blog->generateSlug($blog->title);
        //     $blog->save();
        // });

        // static::updated(function ($blog) {
        //     $blog->slug = $blog->generateSlug($blog->title);
        //     $blog->save();
        // });
    }

    private function generateSlug($title)
    {
        $slug = Str::slug($title);
        if (static::whereSlug($slug)->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function blogParent()
    {
        return $this->belongsTo(Blog::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }
    
}
