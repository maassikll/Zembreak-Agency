<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;


    protected $fillable=[
        'payment',
        'amount',
        'amount_spend',
        'file_path',
        'employe_id',
        'project_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];


    public function employes()
    {
        return $this->belongsTo(Employe::class,'employe_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
