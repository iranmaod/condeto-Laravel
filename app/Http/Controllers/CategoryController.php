<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Category;
use App\Models\Messages;
use App\Models\Types;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use App\Exports\CommCategoryExport;
use App\Models\CommunityCategory;
use App\Exports\MessageExport;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::leftJoin('apt_apply_property', 'categories.building_id', '=', 'apt_apply_property.id')
        ->select('categories.*','apt_apply_property.name')
        ->get();
        return view('admin.category.index',compact('category'));
    }

    public function search(Request $request)
    {
        //    echo '<pre>';
        // print_r($request->all());exit;
        $category = Category::leftJoin('apt_apply_property', 'categories.building_id', '=', 'apt_apply_property.id')
        ->select('categories.*','apt_apply_property.name')
        ->where('cate_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('name', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        // echo '<pre>';
        // print_r($Resource);exit;
        return view('admin.category.search',compact('category'));
    }


    public function create()
    {
        $buildings = Property::where('parent_property_id',40)->get();
        return view('admin.category.create',compact('buildings'));
    }
    public function insert(Request $request)
    {
        $category = new Category();
        $category->building_id = $request->building_id;
        $category->cate_name = $request->name;
        $category->save();
        return redirect()->route('category.index');
    }

    public function comm_index()
    {
        $category = CommunityCategory::leftJoin('apt_apply_property', 'community_categories.object_id', '=', 'apt_apply_property.id')
        ->select('community_categories.*','apt_apply_property.name')
        ->get();
        return view('admin.community_category.index',compact('category'));
    }


    public function comm_search(Request $request)
    {
        //    echo '<pre>';
        // print_r($request->all());exit;
        $category = CommunityCategory::leftJoin('apt_apply_property', 'community_categories.object_id', '=', 'apt_apply_property.id')
        ->select('community_categories.*','apt_apply_property.name')
        ->where('cate_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('name', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        // echo '<pre>';
        // print_r($Resource);exit;
        return view('admin.community_category.search',compact('category'));
    }

    public function comm_create()
    {
        $buildings = Property::where('parent_property_id',40)->get();
        return view('admin.community_category.create',compact('buildings'));
    }

    public function comm_insert(Request $request)
    {
        $category = new CommunityCategory();
        $category->type_id = 0;
        $category->name = $request->name;
        $category->description = $request->name;
        $category->object_id = $request->complex_id;
        $category->save();
        return redirect()->route('community.index');
    }

    public function comm_edit($id)
    {
        $category = CommunityCategory::find($id);
        $buildings = Property::where('parent_property_id',40)->get();
        return view('admin.community_category.edit',compact('buildings','category'));
    }
    public function comm_update(Request $request, $id)
    {
        $category =  CommunityCategory::find($id);
        $category->type_id = 0;
        $category->name = $request->name;
        $category->description = $request->name;
        $category->object_id = $request->complex_id;
        $category->update();
        return redirect()->route('community.index');
    }
    public function comm_delete($id)
    {
        $category = CommunityCategory::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function view_msg()
    {
        $message = Messages::where('type_id',15)->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->select('apt_apply_messages.*','users.first_name','apt_apply_types.description')
        ->paginate(15);

        return view('admin.community_category.msg',compact('message'));
    }


    public function search_msg(Request $request)
    {
        //    echo '<pre>';
        // print_r($request->all());exit;
        $message = Messages::where('type_id',15)->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->select('apt_apply_messages.*','users.first_name','users.last_name','apt_apply_types.description')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
        ->where('last_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('title', 'LIKE', "%{$request->search_text}%")
        ->orWhere('message', 'LIKE', "%{$request->search_text}%")
        ->orWhere('description', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        // echo '<pre>';
        // print_r($Resource);exit;
        return view('admin.community_category.search_msg',compact('message'));
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'category.csv');
    }
    public function comm_export()
    {
        return Excel::download(new CommCategoryExport, 'community_category.csv');
    }
    public function export_msg() 
    {
        return Excel::download(new MessageExport, 'messages.csv');
    }
}
