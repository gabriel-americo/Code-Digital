<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Entities\Banners;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function homepage() {

        $title = "Sistema | Dashboard";
        $banner = Banners::all()->first();

        return view('index', [
            'title' => $title,
            'banner' => $banner
        ]);
    }

}
