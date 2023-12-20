@extends('front.index')
@section('title')
Tasks
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Tasks</h1>
        <p class="sub_title"><a href="#" class="trigger_change_building">
			@foreach($property as $item)
			@if(app('request')->input('change_building') == $item->id)
				{{$item->name}}
			@endif	
			@endforeach
			<span class="fa fa-caret-down"></span></a>
            </p>
          
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>
<div class="swap_property_container">
	<div class="swap_property_inner_container">
		<p>Please select the property you would like to manage</p>
		<select name="select_property" id="select_property">
			@foreach($property as $item)
			<option selected="selected" value="{{$item->id}}">{{$item->name}}</option>
			@endforeach
				
		</select>
	</div>
</div>
@endsection


<div class="container repairs_staff_container">
	
	<div class="errors"></div>
	
	<h2><img src="{{asset('img/event.png')}}" />Today's Tasks: {{date('F d, Y')}} <a href="/calendar"><img src="{{asset('img/calendar-pick.png')}}" alt="Calendar Image" /><span>Calendar</span></a></h2>

	<ul class="todays_tasks">
		@foreach($task as $item)
		<li class="no_task ">
			<a href="{{route('task.detail',$item->type_name)}}">
		<div class="task_container">		
			<p>
				<span class="number_circle">0</span><span class="title">{{$item->description}}</span>
			</p>
			<ul>
				<li style="display:none">
						<img src="{{asset('img/check-grey.png')}}" />
				</li>
				<li>
					<img src="{{asset('img/tasks.png')}}" />							
				</li>
			</ul>
		</div>
		</a>
	</li>	
		@endforeach
				
	</ul>
		
	<h2><img src="{{asset('img/event.png')}}" /><span class="title_text">Tomorrow's Tasks: {{date('F d, Y', strtotime('+1 day'))}}</span><span class="date_range"><span class="date_range_block"><label>From: </label><input type="text" value="November 10, 2022" name="picker_from" id="picker_from" /></span><span class="date_range_block"><label>To : </label><input type="text" name="picker_to" value="November 10, 2022" id="picker_to" /></span></span></h2>
		
	<ul class="todays_tasks">
		@foreach($task as $item)
		<li class="no_task ">
			<a href="{{route('task.detail',$item->type_name)}}">
		<div class="task_container">		
			<p>
				<span class="number_circle">0</span><span class="title">{{$item->description}}</span>
			</p>
			<ul>
				<li style="display:none">
						<img src="{{asset('img/check-grey.png')}}" />
				</li>
				<li>
					<img src="{{asset('img/tasks.png')}}" />							
				</li>
			</ul>
		</div>
		</a>
	</li>	
		@endforeach
				
	</ul>
</div>

	
	
			<br />	
    
@endsection