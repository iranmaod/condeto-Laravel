<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Types;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = Types::where('parent_type_id',46)->get();

        // echo '<pre>';
        // print_r($task);exit;
        $property = Property::where('parent_property_id',40)->get();
        return view('front.task.index',compact('property','task'));
    }
    public function taskDetail($type)
    {
        // echo '<pre>';
        // print_r($type);exit;
        $task = Types::where('parent_type_id',46)->where('type_name',$type)->first();
        //   echo '<pre>';
        // print_r($task);exit;
        $property = Property::where('parent_property_id',40)->get();
        return view('front.task.detail',compact('property','task'));
    }
}
