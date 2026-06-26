<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'old_tier',
        'new_tier',
        'type',
        'amount',
        'status',
        'note',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the amount label for the tier.
     */
    public static function amountForTier(string $tier): int
    {
        return match ($tier) {
            'pro'   => 25000,
            'elite' => 50000,
            default => 0,
        };
    }

    /**
     * Determine the transaction type from tier change.
     */
    public static function typeFromTiers(?string $oldTier, string $newTier): string
    {
        $tierOrder = ['lite' => 0, 'pro' => 1, 'elite' => 2];
        $oldOrder  = $tierOrder[$oldTier] ?? -1;
        $newOrder  = $tierOrder[$newTier] ?? 0;

        if ($oldTier === null) {
            return 'manual';
        }
        return $newOrder > $oldOrder ? 'upgrade' : 'downgrade';
    }
}
