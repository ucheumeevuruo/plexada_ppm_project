<?php
echo  $this->Html->css(array('fullcalendar/fullcalendar.min', 'fullcalendar/fullcalendar.print'));
echo $this->Html->script(array(
    'fullcalendar/moment.min', 'fullcalendar/jquery.min',
    'fullcalendar/fullcalendar.min'
));
?>
<script>
$(document).ready(function() {
    var jData = $("#JSONdata").html();
    //var colors = eventColoralert(jData);
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        events: jQuery.parseJSON(jData),
        defaultDate: '2015-02-12',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
    });
});
</script>
<style>
body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
    font-size: 14px;
}

#calendar {
    max-width: 900px;
    margin: 0 auto;
}
</style>
<?php
$encodedData = json_encode($allevents);
?>
<div id='JSONdata' style="display:none;"><?php echo $encodedData; ?></div>
<div id="eventContent">
    <div id="eventInfo"></div>
</div>
<div id='calendar'></div>