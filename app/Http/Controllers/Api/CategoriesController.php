<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;


use App\Models\Category;
class CategoriesController extends Controller
{
    use GeneralTrait;

    public function index(){
     
        $categories = Category::selection()->get();

        if (!$categories)
        return $this->returnError('404', 'This section does not exist');

        return $this->returnData('categories', $categories,'return data success ');
        
    }

    public function getCategoryById(Request $request)
    {

        $category = Category::selection()->find($request->id);
        if (!$category)
            return $this->returnError('404', 'This section does not exist');

        return $this->returnData('categroy', $category,'return data success ');
    }
}
