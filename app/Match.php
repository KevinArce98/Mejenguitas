<?php

namespace Mejenguitas;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
   public function convertDateToNormal($date){
   		return \DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
   }

   public function convertTimeToNormal($time){
   		return \DateTime::createFromFormat('H:i:s', $time)->format('h:iA');
   }

   public function convertDateToSQL($date){
   		return \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
   }

   public function convertTimeToSQL($time){
   		return \DateTime::createFromFormat('h:iA', $time)->format('H:i:s');
   }

   public function convertTimestamp($date){
         return \DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y h:iA');
   }
}
