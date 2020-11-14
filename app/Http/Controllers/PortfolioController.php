<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Http\Requests\portfolioRequest;
use Auth;

class PortfolioController extends Controller
{
    //

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    // return List of portfolios
    public function index(){

       // $portfolios = Portfolio::where('user_id',Auth::user()->id)->get();

       // show Portfolios of authenticate user usign relations
       $portfolios = Auth::user()->portfolios;

        return view('portfolio.index',['portfolios'=>$portfolios]);

    }


    public function create(){
        return view('portfolio/create');
    }

    public function store(PortfolioRequest $request){
        $portfolio = new Portfolio();

        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->user_id = Auth::user()->id;

        $portfolio->save();

        session()->flash('success_added','Portfolio Added Successfully');

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
