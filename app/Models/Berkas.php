<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas_persyaratan';
    protected $primaryKey = 'berkas_id';

    protected $fillable = [
        'permohonan_id',
        'nama_berkas',
        'valid'
    ];

    protected $casts = [
        'valid' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = [
        'file_count',
        'status_label'
    ];

    /**
     * Relationship dengan permohonan
     */
    public function permohonan()
    {
        return $this->belongsTo(PermohonanSurat::class, 'permohonan_id', 'permohonan_id');
    }

    /**
     * Relationship dengan media
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'berkas_id')
                    ->where('ref_table', 'berkas_persyaratan');
    }

    /**
     * Accessor untuk jumlah file
     */
    public function getFileCountAttribute()
    {
        return $this->media()->count();
    }

    /**
     * Accessor untuk status valid
     */
    public function getStatusValidAttribute()
    {
        return $this->valid ? 'Valid' : 'Belum Valid';
    }

    /**
     * Accessor untuk status label dengan warna
     */
    public function getStatusLabelAttribute()
    {
        return $this->valid ? 
            ['text' => 'Valid', 'class' => 'success'] : 
            ['text' => 'Belum Valid', 'class' => 'warning'];
    }

    /**
     * Scope untuk filter berdasarkan validitas
     */
    public function scopeValid($query, $status = true)
    {
        return $query->where('valid', $status);
    }

    /**
     * Scope untuk filter berdasarkan permohonan
     */
    public function scopeByPermohonan($query, $permohonanId)
    {
        return $query->where('permohonan_id', $permohonanId);
    }

    /**
     * Scope untuk mencari berdasarkan nama
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('nama_berkas', 'like', "%{$search}%");
    }

    /**
     * Accessor untuk file pertama (jika ada)
     */
    public function getFirstFileAttribute()
    {
        return $this->media()->first();
    }

    /**
     * Accessor untuk preview image URL
     */
    public function getPreviewImageAttribute()
    {
        $media = $this->media()->first();
        if ($media && str_contains($media->mime_type, 'image')) {
            return asset('storage/uploads/berkas_persyaratan/' . $media->file_name);
        }
        return null;
    }
}