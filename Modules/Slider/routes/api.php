<?php
use Illuminate\Support\Facades\Route;
use Modules\Slider\Http\Controllers\Backend\API\SlidersController;

Route::get('slider-list', [SlidersController::class, 'sliderList']);

?>


