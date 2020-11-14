<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Http\Requests\portfolioRequest;


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

    public function store(PortfolioRequest $request){
        $portfolio = new Portfolio();

        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->save();

        return redirect ('portfolios');
    }


    public function edit($id){

     $portfolio = Portfolio::find($id);

     return view('portfolio.edit',['portfolio'=>$portfolio]);

    }




    public function update(PortfolioRequest $request ,$id){

     $portfolio = Portfolio::find($id);

     $portfolio->title = $request->input('title');
     $portfolio->description = $request->input('description');

     $portfolio->save();

     return redirect('portfolios');
    }





    public function destroy($id){
     
        Portfolio::find($id)->delete();

        return redirect('portfolios');

    }

}
