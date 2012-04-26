<div id='clock'></div><br />
<div id='description'></div>
<div id='image'></div>

<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
var state = {
	currentTime: 2145,
	speed: 50,
	fastForward: 50,
	regularSpeed: 1000
}

window.timedEvents = <?php echo json_encode($events); ?>;

var display = function display() {
	var currentTime = state.currentTime;
	if(window.timedEvents.hasOwnProperty(currentTime)){
		$('#image').html('<img src="../files/event/photo' + '/' + window.timedEvents[currentTime].id + '/' + window.timedEvents[currentTime].photo + '" height="480" width="640"/>');
		$('#description').html(window.timedEvents[currentTime].content);
		setSpeed(state.regularSpeed);
		var future;
		if(window.timedEvents[currentTime].interval == 1) {
			future = 6000;
		} else {
			future = window.timedEvents[currentTime].interval * 1000;
		}
		setSpeedIn(future, state.fastForward);
	}
	var tempTime = String(incrementTime());
	var time = tempTime.substring(0,2) + ':' + tempTime.substring(2,4);
	// console.log(tempTime);
	$('#clock').html(time);
};

interval = setInterval(display, state.speed);

function setSpeedIn(future, speed){
	var resetSpeed = function resetSpeed(){
		setSpeed(speed);
	};
	setTimeout(function(){
		// $('#image').html("nothing");
		// $('#description').html("nothing");
		resetSpeed();
	}, future);
}

function setSpeed(speed){
	clearInterval(interval);
	state.speed = speed;
	interval = setInterval(display, state.speed);
}

function incrementTime() {
	var hour, minute;
	var currentTime = state.currentTime;
	if(currentTime < 60) {
		hour = 0;
		minute = currentTime;
	} else {
		hour = Number(String(currentTime).substring(0,2));
		minute = Number(String(currentTime).substring(2,4));		
	}
	if(minute < 59) {
		minute++;
	} else if(minute == 59) {
		minute = 0;
		if(hour < 23) {
			hour++;
		} else if(hour == 23) {
			hour = 0;
		}
	}

	state.currentTime = intToTime(hour,minute);
	return state.currentTime;
}

function intToTime(hour, minute) {
	var time = hour * 100 + minute;
	if(hour == 0 && minute < 10) {
		time = String('000' + minute);
	} else if (hour == 0) {
		time = String('00' + minute);
	} else if(time < 1000) {
		time = String('0'+time);
	}
	return time;
}



</script>