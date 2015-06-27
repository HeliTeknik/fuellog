<?php

namespace Fuellog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'color', 'image', 'initial_odometer', 'user_id'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return    Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Fuellog\User');
    }

    /**
     * @return    Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany('Fuellog\Log');
    }

    public static function pickColor()
    {
        $colorArray = [
            "F44336", "9C27B0", "673AB7", "3F51B5", "004D40"
        ];

        $max  = count($colorArray) - 1;
        $rand = rand(1, $max);

        return $colorArray[$rand];
    }

    /**
     * Query scope "allowed".
     *
     * @param   Illuminate\Database\Query\Builder   $query
     * @return  Illuminate\Database\Query\Builder
     */
    public function scopeAllowed($query)
    {
        return $query->isAllowed();
    }

    /**
     * Query scope "isAllowed".
     *
     * @param   Illuminate\Database\Query\Builder   $query
     * @return  Illuminate\Database\Query\Builder
     */
    public function scopeIsAllowed($query)
    {
        return $query->whereHas('user', function($q) {

            return $q->whereId(auth()->id());

        });
    }

    public function getSumDrivenUnits()
    {
        $sum =  $this->logs()->sum('driven_units');

        return round($sum, 1);
    }

    public function getSumTotalCost()
    {
        $sum =  $this->logs()->sum('cost_total');

        return round($sum, 2);
    }

    public function getAverageUsage()
    {
        $avg = $this->logs()->avg('average_usage');

        return round($avg, 2);
    }


}
