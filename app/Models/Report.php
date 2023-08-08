<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'uuid';
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->uuid = (string) Str::uuid();
            $post->from = Request::ip();
        });
    }
    public function getIncrementing()
    {
        return false;
    }
    public function getKeyType()
    {
        return 'string';
    }
    public function proxies(): BelongsToMany {
        return $this->belongsToMany(Proxy::class, 'reports_proxies');
    }
}
