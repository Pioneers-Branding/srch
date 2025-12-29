<?php

namespace App\Jobs;

use App\Models\User;
use Modules\Booking\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendVendorNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $vendorIds;
    protected $bookingId;
    /**
     * Create a new job instance.
     *
     * @param array $vendorIds
     * @param int $bookingId
     * @return void
     */
    public function __construct(array $vendorIds, $bookingId)
    {
        $this->vendorIds = $vendorIds;
        $this->bookingId = $bookingId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $booking = Booking::find($this->bookingId);

        if (!$booking) {
            return; // Exit if booking not found
        }

        // Prepare notification message
        $message = "New booking for {$booking->user->name} for service(s): " . implode(', ', $booking->mainServices->pluck('name')->toArray());

        // Send push notification to each vendor
        foreach ($this->vendorIds as $vendorId) {
            $vendor = User::find($vendorId);

            if (!$vendor) {
                continue; // Skip if vendor not found
            }
            
            // Send push notification
            sendPushNotification($vendor, 'New Booking', $message);
        }
    }
}
