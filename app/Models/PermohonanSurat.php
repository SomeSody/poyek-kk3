<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
    use HasFactory;

    protected $table = 'permohonan_surat';
    protected $primaryKey = 'permohonan_id';

    protected $fillable = [
        'nomor_pemohonan',
        'pemohon_warga_id',
        'jenis_id',
        'tanggal_pengajuan',
        'status',
        'catatan',
        'created_by'
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'datetime',
    ];

    protected $appends = [
        'file_count',
        'media_preview'
    ];

    public function berkasPersyaratan()
    {
        return $this->hasMany(BerkasPersyaratan::class, 'permohonan_id', 'permohonan_id');
    }

    // Tambahkan relasi ke riwayat status
    public function riwayatStatus()
    {
        return $this->hasMany(RiwayatStatusSurat::class, 'permohonan_id', 'permohonan_id')
                    ->orderBy('waktu', 'desc');
    }

    // Tambahkan relasi ke media
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'permohonan_id')
                    ->where('ref_table', 'permohonan_surat')
                    ->orderBy('sort_order');
    }

    // Method untuk menambahkan riwayat status baru
    public function tambahRiwayatStatus($status, $petugasId, $keterangan = null)
    {
        return $this->riwayatStatus()->create([
            'status' => $status,
            'petugas_warga_id' => $petugasId,
            'waktu' => now(),
            'keterangan' => $keterangan
        ]);
    }

    // Method untuk mendapatkan status terakhir
    public function getStatusTerakhirAttribute()
    {
        return $this->riwayatStatus->first();
    }

    public function pemohon()
    {
        return $this->belongsTo(Warga::class, 'pemohon_warga_id', 'warga_id');
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_id', 'jenis_id');
    }

    // Accessor untuk jumlah file
    public function getFileCountAttribute()
    {
        return $this->media()->count();
    }

    // Accessor untuk media preview (file pertama jika gambar)
    public function getMediaPreviewAttribute()
    {
        $media = $this->media()->first();
        if ($media && str_contains($media->mime_type, 'image')) {
            return asset('storage/uploads/permohonan_surat/' . $media->file_name);
        }
        return null;
    }

    // Scope untuk search
    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            })
            ->orWhereHas('pemohon', function($q) use ($request) {
                $q->where('nama', 'LIKE', '%' . $request->search . '%');
            })
            ->orWhereHas('jenisSurat', function($q) use ($request) {
                $q->where('nama_jenis', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('kode', 'LIKE', '%' . $request->search . '%');
            });
        }
        return $query;
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        $labels = [
        'draft' => ['text' => 'Draft', 'class' => 'secondary'],
        'diajukan' => ['text' => 'Diajukan', 'class' => 'info'], // ✅ Ganti 'pending' dengan 'diajukan'
        'diproses' => ['text' => 'Diproses', 'class' => 'primary'],
        'ditolak' => ['text' => 'Ditolak', 'class' => 'danger'],
        'selesai' => ['text' => 'Selesai', 'class' => 'success']
    ];

        return $labels[$this->status] ?? ['text' => 'Unknown', 'class' => 'secondary'];
    }

    // Method untuk statistik
    public static function getStats()
    {
        $total = self::count();
        $pending = self::where('status', 'pending')->count();
        $diproses = self::where('status', 'diproses')->count();
        $ditolak = self::where('status', 'ditolak')->count();
        $selesai = self::where('status', 'selesai')->count();

        return [
            'total' => $total,
            'pending' => $pending,
            'diproses' => $diproses,
            'ditolak' => $ditolak,
            'selesai' => $selesai,
        ];
    }

    // Accessor untuk status text
    public function getStatusTextAttribute()
    {
        $statuses = [
            'pending' => 'Menunggu',
            'diproses' => 'Diproses',
            'ditolak' => 'Ditolak',
            'selesai' => 'Selesai'
        ];

        return $statuses[$this->status] ?? 'Tidak diketahui';
    }

    // Accessor untuk status color
    public function getStatusColorAttribute()
    {
        $colors = [
            'pending' => 'warning',
            'diproses' => 'info',
            'ditolak' => 'danger',
            'selesai' => 'success'
        ];

        return $colors[$this->status] ?? 'secondary';
    }

    // Scope untuk filter berdasarkan status
    public function scopeByStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }

    // Scope untuk filter berdasarkan jenis surat
    public function scopeByJenisSurat($query, $jenisId)
    {
        if ($jenisId) {
            return $query->where('jenis_id', $jenisId);
        }
        return $query;
    }

    // Scope untuk filter berdasarkan tanggal
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return $query->whereBetween('tanggal_pengajuan', [$startDate, $endDate]);
        } elseif ($startDate) {
            return $query->where('tanggal_pengajuan', '>=', $startDate);
        } elseif ($endDate) {
            return $query->where('tanggal_pengajuan', '<=', $endDate);
        }
        return $query;
    }

    // Scope untuk warga tertentu
    public function scopeByWarga($query, $wargaId)
    {
        if ($wargaId) {
            return $query->where('pemohon_warga_id', $wargaId);
        }
        return $query;
    }
}