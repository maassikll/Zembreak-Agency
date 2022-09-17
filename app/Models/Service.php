<?php

namespace App\Models;


use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function projects()
    {
        return $this->BelongsToMany(Project::class);
    }

    public function employes(){
        return $this->belongsToMany(Employe::class);
    }


}
