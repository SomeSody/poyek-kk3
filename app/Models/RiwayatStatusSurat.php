<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatStatusSurat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_status_surat';
    protected $primaryKey = 'riwayat_id';

    protected $fillable = [
        'permohonan_id',
        'status',
        'petugas_warga_id',
        'waktu',
        'keterangan'
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];

    public function permohonan()
    {
        return $this->belongsTo(PermohonanSurat::class, 'permohonan_id', 'permohonan_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Warga::class, 'petugas_warga_id', 'warga_id');
    }

    // Accessor untuk status label - SESUAIKAN DENGAN MIGRATION
    public function getStatusLabelAttribute()
    {
        $labels = [
            'draft' => ['text' => 'Draft', 'class' => 'secondary'],
            'diajukan' => ['text' => 'Diajukan', 'class' => 'info'], 
            'diproses' => ['text' => 'Diproses', 'class' => 'primary'],
            'ditolak' => ['text' => 'Ditolak', 'class' => 'danger'],
            'selesai' => ['text' => 'Selesai', 'class' => 'success']
        ];

        return $labels[$this->status] ?? ['text' => 'Unknown', 'class' => 'secondary'];
    }
}