<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul', 'slug', 'kategori', 'konten'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}