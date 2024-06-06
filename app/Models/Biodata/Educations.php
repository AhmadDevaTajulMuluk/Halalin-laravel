<?php

namespace App\Models\Biodata;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $primaryKey = 'education_id';

    protected $fillable = [
        'user_id',
        'elementarySchool',
        'juniorHighSchool',
        'seniorHighSchool',
        'collegeS1',
        'majorS1',
        'collegeS2',
        'majorS2',
        'collegeS3',
        'majorS3',
    ];
}
