<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class UserDetail extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $guarded = [];

    protected $casts = [
        'skillIds'=> 'array'
    ];

    protected $appends = ['profile_image'];

    public function getProfileImageAttribute()
    {

        // Get the first media item from the 'images' collection for this user
        $media = $this->getFirstMedia('profileImage');

        // Get the URL of the media, if available
        return $media ? $media->getUrl() : null;
    }

    public function toArray()
    {
        // Get the original array representation of the model
        $array = parent::toArray();

        // Remove the 'media' key from the array
        unset($array['media']);

        // Return the modified array
        return $array;
    }

    public function registerMediaCollections(): void
    {   
        $this->addMediaCollection('profileImage');
    }

    // deleting user assoiated file from database
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Delete user's media when the user is deleted
            $user->clearMediaCollection();
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function employmentHistory(){
        return $this->hasMany(EmploymentHistory::class);
    }

    public function education(){
        return $this->hasMany(Education::class);
    }

    public function courses(){
        return $this->hasMany(Courses::class);
    }

    public function userLanguages(){
        return $this->hasMany(UserLanguage::class);
    }

    public function socialLinks(){
        return $this->hasMany(SocialLink::class);
    }

}
