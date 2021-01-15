<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{

    function index(){

        $path =  storage_path('app/public/files');        
        $files = File::allFiles($path);      
        $fileNames = [];
        foreach ($files as $fileinfo) {
            $fileNames[]['name'] = $fileinfo->getFilename();
        }               

        $files = $this->paginate($fileNames);

        //dd($data);        
        return view('home', compact('files'));        
    }

    public function paginate($items, $perPage = 2, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }    
}
