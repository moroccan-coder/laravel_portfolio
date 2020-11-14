<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class PortfolioController extends Controller
{
    //
    
    // return List of portfolios
    public function index(){

        $portfolios = Portfolio::all();

        return view('portfolio.index',['portfolios'=>$portfolios]);

    }


    public function create(){
        return view('portfolio/create');
    }

    public function store(Request $request){
        $portfolio = new Portfolio();

        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->save();

        return redirect ('portfolios');
    }


    public function edit(){}
    public function update(){}
    public function destroy(){}

}
