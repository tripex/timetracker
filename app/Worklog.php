<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Worklog extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'worklog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fk_client', 'fk_user', 'hours_used', 'note', 'work_date_start','work_date_end','odometer_start','odometer_end', 'kilometers'];
}
