<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=[
        'company',
        'adress',
        'category',
        'person_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function person()
    {
    return $this->belongsTo(Person::class,'person_id');
    }

    public function project()
    {
        return $this->BelongsToMany(Project::class);
    }

}
