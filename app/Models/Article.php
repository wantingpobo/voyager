<?php

namespace App\Models;

use App\Models\Cgy;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['subject','content','sort','enabled_at','enabled','pic','cgy_id'];

    public function cgy()
    {
        return $this->belongsTo(Cgy::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps()->withPivot(['color']);
    }
}
