<?php
namespace App;

use App\Note;
use App\Service;
use Carbon\Carbon;
use App\ServiceRequest;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'active',
        'message',
        'important',
        'requested_date',
        'service_id',
        'service_request_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['diff'];

    /**
    * A lead has one service.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne;
    */
    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

    /**
    * A lead has one service request.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne;
    */
    public function serviceRequest()
    {
        return $this->hasOne(ServiceRequest::class, 'id', 'service_request_id');
    }

    /**
     * A lead has many notes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Return the URL for the lead
     *
     * @return string
     */
    public function path()
    {
        return '/leads/'. $this->id;
    }

    /**
     * Return the URL for the Lead's notes
     *
     * @return string
     */
    public function notesPath()
    {
        return $this->path() . '/notes';
    }

    /**
     * Scope a query to only include active leads.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Scope a query to only include archived leads.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArchived($query)
    {
        return $query->where('active', 0);
    }

    /**
     * Get the created_at time difference in a human-readable format
     *
     * @return string
     */
    public function getDiffAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
