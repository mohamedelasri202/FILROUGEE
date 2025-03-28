<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ServiceRepository;
use App\Repositories\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    protected $ServiceRepository;

    public function __construct(ServiceRepository $ServiceRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
    }




    public function index()
    {
        $services = $this->ServiceRepository->showALLservices();
        return view('dashboard.service_provider', compact('services'));
    }
    public function add_service(Request $request)
    {
        $imagePath = null;

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'category' => 'required|string'

        ]);



        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $this->ServiceRepository->add_service($request, $imagePath);

        return redirect()->route('dashboard.service_provider')->with('success', 'Product added successfully!');
    }
}
