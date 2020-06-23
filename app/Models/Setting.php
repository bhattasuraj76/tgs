<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'id';
    protected $tableName = 'settings';

    protected $fillable = [
        'site_name', 'company_name', 'site_owner', 'slogan', 'about_us', 'established_year', 'office_time',
        'fax_no', 'postal_code', 'primary_email', 'secondary_email', 'tertiary_email',
        'phone1', 'phone2', 'mobile1', 'mobile2', 'employee1', 'employee2',
        'street_address', 'city', 'state', 'country', 'time_zone',
        'facebook_link', 'instagram_link', 'twitter_link', 'pinterest_link', 'linkedin_link', 'youtube_link', 'skype_link', 'map_iframe',
        'office_start_time', 'office_end_time', 'break_start_time', 'break_end_time', 'max_quotas', 'allocation_time',
        'meta_title', 'meta_keywords', 'meta_description',
    ];

    public function getAddressAttribute()
    {
        $data = "";
        //get city
        if (!empty($this->attributes['city']))  $data = $this->attributes['city'];
        //append country
        if (!empty($this->attributes['country']))  $data =  $data . ',' . $this->attributes['country'];
        return $data;
    }
}
