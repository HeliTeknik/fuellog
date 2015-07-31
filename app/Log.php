<?php

namespace Fuellog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'log_date', 'fueled_units', 'driven_units', 'cost_per_unit', 'cost_total', 'longitude', 'latitude', 'vehicle_id', 'average_usage'
    ];

    protected $dates = ['log_date', 'deleted_at'];

    public static function calculateAverageUsage($fueledUnits, $drivenUnits)
    {
        return ($fueledUnits / ($drivenUnits / 100));
    }

    /**
     * @return    Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo('Fuellog\Vehicle');
    }


    /**
     * Retrieve the Longitude attribute.
     *
     * @param   mixed
     * @return  string
     */
    public function getLongitudeAttribute($value)
    {
        return \Crypt::decrypt($value);
    }

    /**
     * Set the Longitude attribute.
     *
     * @param   mixed
     * @return  void
     */
    public function setLongitudeAttribute($value)
    {
        $this->attributes['longitude'] = \Crypt::encrypt($value);
    }

    /**
     * Retrieve the latitude attribute.
     *
     * @param   mixed
     * @return  string
     */
    public function getLatitudeAttribute($value)
    {
        return \Crypt::decrypt($value);
    }

    /**
     * Set the latitude attribute.
     *
     * @param   mixed
     * @return  void
     */
    public function setLatitudeAttribute($value)
    {
        $this->attributes['latitude'] = \Crypt::encrypt($value);
    }


    /**
     * Determine if Log has valid coordinates
     * @return boolean
     */
    public function hasCoordinates()
    {
        if ($this->latitude != 0 && $this->longitude != 0) {
            return true;
        }

        return false;
    }
}
