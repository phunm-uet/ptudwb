<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
use App\Like;
use DB;
use App\Document;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend("vnuemail",function($attribute, $value,$parameters){
            $pattern = '/^[a-z0-9](\.?[a-z0-9]){2,}@vnu\.edu.vn$/';
            return preg_match($pattern, $value);
        });     

        $like_trends = Like::groupBy('doc_id')->select('doc_id', DB::raw('count(*) as total'))->orderBy('total',"DESC")->take(3)->get();
        $i = 0;
        foreach ($like_trends as $like) {
            $doc_trend[$i] = Document::where("id",$like->doc_id)->first();
            $i++;
        } 
        view()->share('like_trends', $like_trends);
        view()->share('doc_trend',$doc_trend);       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
