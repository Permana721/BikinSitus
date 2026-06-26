<?php

namespace App\Observers;

use App\Models\Transaction;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "updating" event — fires before the save so we can
     * compare the original (dirty check) values.
     */
    public function updating(User $user): void
    {
        // Only track tier changes for regular users, not admins.
        if ($user->role !== 'user') {
            return;
        }

        // Only proceed if the tier column is actually changing.
        if (! $user->isDirty('tier')) {
            return;
        }

        $oldTier = $user->getOriginal('tier');
        $newTier = $user->tier;

        // Skip if tier hasn't really changed.
        if ($oldTier === $newTier) {
            return;
        }

        $type   = Transaction::typeFromTiers($oldTier, $newTier);
        $amount = Transaction::amountForTier($newTier);

        Transaction::create([
            'user_id'  => $user->id,
            'old_tier' => $oldTier,
            'new_tier' => $newTier,
            'type'     => $type,
            'amount'   => $amount,
            'status'   => 'success',
            'note'     => "Tier changed from {$oldTier} to {$newTier} by admin.",
        ]);
    }
}
