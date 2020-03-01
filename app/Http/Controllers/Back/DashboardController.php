<?php

namespace App\Http\Controllers\back;

use App\Models\OfficeCheckIn;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $this->data('title',$this->title('Admin Dashboard'));
        $totalCheckIn = OfficeCheckIn::where('status','!=','Completed')->get()->count();

        $totalPartners = Partner::all()->count();
        $totalProducts = Product::all()->count();
        $totalInquiry = Inquiry::all()->count();

        return view(
            'back.pages.dashboard.dashboard',
            $this->data, compact('totalCheckIn','totalPartners','totalProducts','totalInquiry')
        );
    }
    public function reception()
    {
        $this->data('title',$this->title('Reception Dashboard'));
        return view(
            'back.reception-counselor.pages.dashboard.dashboard',
            $this->data
        );
    }

    public function counselor()
    {
        $this->data('title',$this->title('Counselor Dashboard'));
        return view(
            'back.reception-counselor.pages.dashboard.dashboard',
            $this->data
        );
    }

    public function myProfile($userName)
    {
        print_r($userName);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
