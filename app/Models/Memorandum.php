<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Memorandum extends Model
{
    protected $table = 'memorandums';
    protected $fillable = [
        'user_id',
        'property_title',
        'address',
        'city',
        'state',
        'zip',
        'cover_page_image',
        'subject_property_thumbnail',
        'text',
        'footer',
        'business_card_1',
        'business_card_2'
    ];

    protected static function boot(){
        parent::boot();
        static::addGlobalScope('id', function (Builder $builder){
           $builder->orderByDesc('id');
        });
    }

    public function memorandum_setting(){
        return $this->hasOne(MemorandumSetting::class, 'memorandum_id', 'id');
    }

    public function memo_file(){
        return $this->hasOne(MemoFile::class, 'memorandum_id', 'id');
    }

    public function members(){
        return $this->hasMany(MemorandumMember::class,'memorandum_id', 'id');
    }

    public function memo_pages(){
        return $this->hasMany(MemoPage::class,'memorandum_id', 'id');
    }

    public function market_pages(){
        return $this->hasMany(MarketPage::class,'memorandum_id', 'id');
    }

    public function gallery_templates(){
        return $this->hasMany(GalleryTemplate::class,'memorandum_id', 'id');
    }

    public function timeline_pages(){
        return $this->hasMany(MarketTimelinePage::class,'memorandum_id', 'id');
    }

    public function demographic_pages(){
        return $this->hasMany(DemographicPage::class,'memorandum_id', 'id');
    }

    public function recent_sales(){
        return $this->hasMany(RecentSale::class,'memorandum_id', 'id');
    }

    public function market_comparables(){
        return $this->hasMany(MarketComparable::class,'memorandum_id', 'id');
    }

    public function rent_comparables(){
        return $this->hasMany(RentComparable::class,'memorandum_id', 'id');
    }

    public function job(){
        return $this->hasOne(Job::class);
    }

    public function market_job(){
        return $this->hasOne(MarketJob::class);
    }

    public function recent_graphs(){
        return $this->hasMany(RecentSaleGraph::class,'memorandum_id', 'id');
    }

    public function rent_graphs(){
        return $this->hasMany(RentComparableGraph::class,'memorandum_id', 'id');
    }

    public function market_graphs(){
        return $this->hasMany(RentComparableGraph::class,'memorandum_id', 'id');
    }
}
