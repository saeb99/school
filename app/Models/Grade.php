<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasTranslations;

    protected $table = "grades";

    protected $fillable = [
        'name',
        'note'
    ];

    public $translatable = [
        'name'
    ];

}
