<?php

namespace Mejenguitas;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'players', 'price', 'hour', 'date', 'site', 'lat', 'lng', 'info'
    ];

    public function setHourAttribute($hour)
    {
      $this->attributes['hour'] = \DateTime::createFromFormat('h:iA', $hour)->format('H:i:s');
    }

    public function setDateAttribute($date)
    {
      $this->attributes['date'] = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }


    public function convertDateToNormal($date){
     	return \DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function convertTimeToNormal($time){
     	return \DateTime::createFromFormat('H:i:s', $time)->format('h:iA');
    }

    public function convertTimestamp($date){
          return \DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y h:iA');
    }

    public function users(){
       return $this->belongsToMany(User::class, 'assigned_matchs');
    }
}
