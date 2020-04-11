<?php   
public function event_calendar() {
        //fetch all the events from the database (say we have and Event table)
        // the default parameters that we use as a key for any array 
        // fetched by find quey are as ('title','user','start','end','backgroudColor','textColor')
For Example:-
$events = $this->Event->find('all',array(
                'fields'=>array(
                'eventname',
                'Client.firstname', // if we find any association
                'startdate',
                'enddate','id')));
$allevents=array();
foreach($events as $event){
        $allevents[]=array(
             'title'     =>$event['Event']['eventname'],
             'user'      =>$event['Client']['firstname'],
             'start'     =>$event['Event']['startdate'],
             'end'       =>$event['Event']['enddate'],
             'backgroundColor'=>$eventcolor,
             'textColor' =>'#000000');
    }
  $this->set('allevents',$allevents);