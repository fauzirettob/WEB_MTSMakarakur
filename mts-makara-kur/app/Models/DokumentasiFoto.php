<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumentasiFoto extends Model
{
    protected $table = 'dokumentasi_fotos';

    protected $fillable = ['file', 'caption'];

    protected $appends = ['url', 'uploaded_at'];

    public function getUrlAttribute(): string
    {
        return asset('storage/dokumentasi/' . $this->file);
    }

    public function getUploadedAtAttribute(): string
    {
        return $this->created_at
            ? $this->created_at->locale('id')->translatedFormat('d M Y')
            : '';
    }
}
