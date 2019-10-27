<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model{
   /**
   * The table associated with the model.
   *
   * @var string
   */
    protected $table = 'employee';

    /**
     * Get the company of employee.
    */
    public function company()
    {
        return $this->belongsTo('App\Companies','company_id');
    }
}
