<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialStatement extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'entry_point_id', 'year', 'value'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function entryPoint(){
        return $this->belongsTo(FsEntryPoint::class);
    }
}
