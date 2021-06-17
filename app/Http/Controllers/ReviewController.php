<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

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
     * Filter reviews by rating.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
    }

    /**
     * Add a review.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add-review");
    }

    /**
     * Save a review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review();
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
