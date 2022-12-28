<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{

    use HasTranslations;

    protected $fillable = [
        'name',
        'grade_id',
    ];

    public $translatable = [
        'name'
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class , 'grade_id');
    }
}
