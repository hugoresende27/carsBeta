<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    //protected $timestamps = true;

    //protected $dateFormat = 'h:m:s';

    protected $fillable = ['name', 'founded', 'description'];

    //protected $hidden = ['id'];

    protected $visible = ['id','name', 'founded', 'created_at','description'];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }

    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    //relação has many
    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class, 
            CarModel::class, 
            'car_id',   // Foreign key on the environments table...
            'model_id', // Foreign key on the deployments table...
         
        );
    }

    //relação has one
    public function dates()
    {
        return $this->hasOneThrough(
            CarDate::class, 
            CarModel::class, 
            'car_id',   // Foreign key on the environments table...
            'model_id', // Foreign key on the deployments table...
         
        );
    }

    //relação many to many
    public function products()
    {
        return $this->belongsToMany(Product::class);
   
    }
}
