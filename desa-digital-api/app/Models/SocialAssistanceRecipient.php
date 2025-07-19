<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistanceRecipient extends Model
{
    use SoftDeletes, UUID, HasFactory;

    protected $fillable = [
        'social_assistance_id',
        'head_of_family_id',
        'bank',
        'amount',
        'reason',
        'account_number',
        'proof',
        'status',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->whereHas('headOfFamily.user', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
                ->orWhereHas('socialAssistance', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('provider', 'like', "%{$search}%");
                });
        });
    }


    public function socialAssistance()
    {
        return $this->belongsTo(SocialAssistance::class);
    }

    public function headOfFamily()
    {
        return $this->belongsTo(HeadOfFamily::class);
    }
}
