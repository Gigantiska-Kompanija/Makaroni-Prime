<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productName' => 'required|unique:makarons|max:191',
            'rating' => 'required|numeric|integer|min:0',
            'comment' => 'required',
        ]);
        $review = new Review();
        $review->clientID = Auth::id();
        $review->productName = $request->name;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        return view("store");
    }

    /**
     * Destroy a review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
