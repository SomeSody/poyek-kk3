<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';
    protected $primaryKey = 'jenis_id';
    protected $fillable = ['kode', 'nama_jenis', 'syarat'];

    // Accessor untuk syarat_json
    public function getSyaratListAttribute()
    {
        if ($this->syarat_json) {
            $syarat = json_decode($this->syarat_json, true);
            return is_array($syarat) ? $syarat : [];
        }
        return [];
    }

    // Scope untuk search
    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
        return $query;
    }

    // Scope untuk filter berdasarkan kode
    public function scopeFilterByKode($query, $kode)
    {
        if ($kode) {
            return $query->where('kode', 'LIKE', '%' . $kode . '%');
        }
        return $query;
    }

    // Scope untuk filter memiliki syarat
    public function scopeFilterBySyarat($query, $hasSyarat)
    {
        if ($hasSyarat === 'with') {
            return $query->whereNotNull('syarat_json')->where('syarat_json', '!=', '');
        } elseif ($hasSyarat === 'without') {
            return $query->whereNull('syarat_json')->orWhere('syarat_json', '');
        }
        return $query;
    }

    // scope filter umum
    public function scopeFilter($query, $request, array $columns)
    {
        foreach ($columns as $column) {
            if ($request->filled($column)) {

                if ($column === 'syarat') {
                    if ($request->$column === 'with') {
                        $query->whereNotNull('syarat_json')
                            ->where('syarat_json', '!=', '');
                    }

                    if ($request->$column === 'without') {
                        $query->where(function ($q) {
                            $q->whereNull('syarat_json')
                            ->orWhere('syarat_json', '');
                        });
                    }
                } else {
                    $query->where($column, 'LIKE', '%' . $request->$column . '%');
                }
            }
        }

        return $query;
    }

}
