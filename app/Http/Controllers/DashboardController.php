<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the latest 5 products
        $products = Product::latest()->take(5)->get();
    
        // Count various statistics
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
    
        // Return the view with all required variables
        return view('adminpage.pages.dashboard', compact('products', 'totalUsers', 'activeUsers', 'totalProducts', 'activeProducts'));
    }
    

}
