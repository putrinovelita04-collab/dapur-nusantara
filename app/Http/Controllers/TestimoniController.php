<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::published()->latest()->paginate(9);

        return view('testimoni', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'occasion'      => 'nullable|string|max:255',
            'rating'        => 'required|integer|between:1,5',
            'message'       => 'required|string|max:1000',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        $validated['is_published'] = false;

        Testimonial::create($validated);

        return back()->with('success', 'Terima kasih! Testimoni Anda berhasil dikirim dan akan ditampilkan setelah diverifikasi.');
    }
}
