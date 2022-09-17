<?php

namespace App\Models;


use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $fillable=[
        'services',
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

    public function bills()
    {
        return $this->belongsToMany(Bill::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
        
    }


    public function projects(){
        return $this->belongsToMany(Project::class);
    }




}
