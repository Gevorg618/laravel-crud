<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model as CarModel;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var $fillable
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function models()
    {
        return $this->hasMany(CarModel::class);
    }
}
