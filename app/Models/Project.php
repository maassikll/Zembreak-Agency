<?php

namespace App\Models;


use App\Models\Employe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;



    protected $fillable=[
        'estimed_date',
        'infos',
        'customer_id',
        'service_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
 
    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class,'customer_id');

    }

    public function Bill()
    {
        return $this->hasOne(Bill::class);
    }

    public function employes(){
        return $this->belongsToMany(Employe::class);
    }
    
}
