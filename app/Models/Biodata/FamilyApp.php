<?php

namespace App\Models\Biodata;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyApp extends Model
{
    use HasFactory;

    protected $table = 'family_apps';

    protected $primaryKey = 'family_id';

    protected $fillable = [
        'user_id',
        'fathers_name',
        'fathers_job',
        'mothers_name',
        'mothers_job',
        'old_siblings',
        'young_siblings',
        'backbone_family',
    ];
}
