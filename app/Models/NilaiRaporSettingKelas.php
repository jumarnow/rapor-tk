<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiRaporSettingKelas extends Model
{
    use HasFactory;

    protected $fillable = ['nilai_rapor_setting_id', 'kelas_id', 'nilai_rapor_setting_str', 'kelas_str'];

    public function nilaiRaporSetting()
    {
        return $this->belongsTo(NilaiRaporSetting::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
