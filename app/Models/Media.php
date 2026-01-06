<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $primaryKey = 'media_id';
    
    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_url',
        'caption',
        'mime_type',
        'sort_order'
    ];

    // Scope untuk filter berdasarkan tabel
    public function scopeForTable($query, $tableName)
    {
        return $query->where('ref_table', $tableName);
    }

    // Relationship polimorfik
    public function mediaable()
    {
        return $this->morphTo('mediaable', 'ref_table', 'ref_id');
    }
}