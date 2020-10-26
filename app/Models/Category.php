<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

         /**
     * @todo The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * @todo The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name_en','name_nl','created_at','updated_at'
    ];

    public function scopeSelection($query)
    {
        return $query->select('id', 'name_' . app()->getLocale() . ' as name','created_at','updated_at');
    }
}
