<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
   /**
    * The table associated with the model.
    *
    * @var string
  */
   protected $table = 'companies';
   /**
   * Get the employee for the company.
   */
   public function employee()
   {
       return $this->hasMany('App\Employee');
   }
}
