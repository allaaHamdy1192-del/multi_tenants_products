<?php

namespace App\Http\Controllers;

use App\Models\TenantModel;
use Illuminate\Http\Request;

class MerchantRegisterController extends Controller
{
    public function create()
    {
        return view('register-store');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email',
            'subdomain' => 'required|alpha_dash|unique:domains,domain',
        ]);

        // Creating the tenant fires the pipeline in TenancyServiceProvider:
        // create database -> run tenant migrations -> (optional) seed
        $tenant = TenantModel::create([
            'id'    => $data['subdomain'],
            'name'  => $data['name'],
            'email' => $data['email'],
        ]);

        // Store ONLY the subdomain part (not "store1.yourapp.com")
        $tenant->domains()->create(['domain' => $data['subdomain']]);

        return redirect()->away(
             request()->getScheme() . '://' . $data['subdomain'] . '.' . config('tenancy.central_domains')[1] . ':' . request()->getPort()
             );        
    }
}