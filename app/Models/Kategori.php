<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    //setup nama table yang diakses, menambahkan identitas tabel yang diakses
    protected $table = 'kategori';

    //menambahkan mass assignment, daftar field untuk operasi CRUD
    protected $fillable = ['deskripsi','kategori'];

    public function barang()
    {
        return $this->hasMany(barang::class);
    }


}
