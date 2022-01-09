<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Translation\Command\TranslationTrait;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blogs';
    protected $fillable = [
        'status', 'thumbnail', 'topic_id', 'read_time'
    ];

    public function getThumbnail()
    {
        $base_url = URL::to('/');
        return  $base_url.$this->thumbnail ?? '';
    }

    public function translations() 
    {
        return $this->hasMany(BlogTranslation::class, 'blog_id', 'id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function scopeLocale($query, $language)
    {
        return $query->whereHas('translation', function($query) use($language) {
            return $query->where('locale', $language);
        });
    }

    public function translation()
    {
        $locale = Session::get('language', config('app.locale'));
        $translation = BlogTranslation::whereBlogId($this->id)->whereLocale($locale)->first();
        if($translation == null) {
            $translation = BlogTranslation::whereBlogId($this->id)->first();
        }
        return $translation;
    }

    public function scopeSearchAjax($query, $value)
    {   
        return $query->whereHas('translations', function($query) use($value) {
            return $query->where('title', 'LIKE' ,'%'.$value.'%');
        })->orWhereHas('topic', function($query) use($value) {
            return $query->where('name', 'LIKE', '%'.$value.'%');
        });
    }

    public function isPublished()
    {
        return $this->status == 1;
    }

    public function scopePublishStatus($query)
    {
        return $query->where('status', 1);
    }
    
}
