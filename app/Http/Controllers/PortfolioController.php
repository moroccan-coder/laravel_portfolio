<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Http\Requests\portfolioRequest;
use Auth;
use Illuminate\Http\UploadedFile;

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


       //store upload image
       if($request->hasFile('foto'))
       {
           //store image inside images folder into storage\app  + passe the path of saved image into pic inside our database table
           $portfolio->pic = $request->foto->store('images');

          
       }


        $portfolio->save();

        session()->flash('success_added','Portfolio Added Successfully');

        return redirect ('portfolios');
    }


    public function edit($id){

     $portfolio = Portfolio::find($id);


     $this->authorize('update',$portfolio);

     return view('portfolio.edit',['portfolio'=>$portfolio]);

    }




    public function update(PortfolioRequest $request ,$id){

     $portfolio = Portfolio::find($id);

     $portfolio->title = $request->input('title');
     $portfolio->description = $request->input('description');

      //store upload image
      if($request->hasFile('foto'))
      {
          //store image inside images folder into storage\app  + passe the path of saved image into pic inside our database table
          $portfolio->pic = $request->foto->store('images');

         
      }

     $portfolio->save();

     return redirect('portfolios');
    }





    public function destroy($id){
     
        Portfolio::find($id)->delete();

        return redirect('portfolios');

    }

}
