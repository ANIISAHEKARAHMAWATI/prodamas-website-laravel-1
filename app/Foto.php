<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Foto extends Model
{
    protected $table = "fotos";

    protected $fillable = ["gambar_sampul","text_sampul","judul","slug","konten","caption"];

    public function getCreatedAtAttribute() {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('d F Y');
    }
}