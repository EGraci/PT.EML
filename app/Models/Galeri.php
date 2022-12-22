<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $fillable = [
        'judul',
        'gambar',
    ];
    public function exitsById($id)
    {
        $checkGaleri = Galeri::where([
            ['galeri.id_galeri', '=', $id],
        ])
        ->count();
        return $checkGaleri;
    }
}
