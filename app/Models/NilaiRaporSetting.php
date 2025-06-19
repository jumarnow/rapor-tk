<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiRaporSetting extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'tahun_ajaran_id'];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function nilaiRaporSettingKelas()
    {
        return $this->hasMany(NilaiRaporSettingKelas::class);
    }
}
