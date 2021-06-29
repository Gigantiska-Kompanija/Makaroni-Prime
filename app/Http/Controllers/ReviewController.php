<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Makarons;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * List all reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Add a review.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("add-review", compact('id'));
    }

    /**
     * Save a review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'rating' => 'required|numeric|integer|min:0|max:5',
            'comment' => 'required|string|max:10000',
        ]);
        $review = new Review();
        $review->clientID = Auth::id();
        $review->productName = $id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        Audit::create('create-review', $request, null, $review->id);
        return redirect(route('makaroni.show', $id));
    }

    /**
     * Destroy a review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Audit::create('destroy-review', $request, null, $id);
        Review::findOrFail($id)->delete();
    }
}
