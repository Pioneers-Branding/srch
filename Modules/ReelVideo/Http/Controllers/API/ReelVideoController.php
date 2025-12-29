<?php

namespace Modules\ReelVideo\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ReelVideo\Models\ReelVideo;
use Modules\ReelVideo\Transformers\VideoResource;

class ReelVideoController extends Controller
{
    public function __construct()
    {
    }

    public function videoList(Request $request)
    {

        $videos = ReelVideo::with('media')->where('status', 1)->latest()->get();
        
        $videoCollection = VideoResource::collection($videos);

        return response()->json([
            'status' => true,
            'data' => $videoCollection,
            'message' => __('Video List'),
        ], 200);
    }

}
