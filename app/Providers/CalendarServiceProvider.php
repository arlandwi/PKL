<?php
namespace App\Providers;

use DB;
use App\Task;
use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
{
    public function boot()
    {
    	view()->composer('layouts.app',function($view){
    		$events = Task::get();
	        $events_list = [];
	        foreach ($events as $key => $event) {
	            $events_list[]=Calendar::event(
	                $event->judul_task,
	                true,
	                new \DateTime($event->tgl_mulai),
	                new \DateTime($event->deadline.'+1 day')
	            );
	        }
	        $calendar_detailss = Calendar::addEvents($events_list);
	        $view->with('calendar_details', $calendar_detail->calendar_details);
    	});
    }
}
