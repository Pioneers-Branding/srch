<?php
use Illuminate\Support\Facades\Route;
use Modules\ReelVideo\Http\Controllers\API\ReelVideoController;

Route::get('video-list', [ReelVideoController::class, 'videoList']);

?>


