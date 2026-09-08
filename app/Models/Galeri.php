<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'foto'];
}