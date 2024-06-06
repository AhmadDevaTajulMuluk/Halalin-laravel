<?php

namespace App\Models\Biodata;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalApp extends Model
{
    use HasFactory;

    protected $table = 'physical_apps';

    protected $primaryKey = 'app_id';

    protected $fillable = [
        'user_id',
        'skincolor',
        'haircolor',
        'hairtype',
        'height',
        'weight',
        'illness',
        'uniqueTraits',
        'disability',
    ];
}
