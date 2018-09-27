var current_step = 1;

function changeStep(step){
	$(".step_url").removeClass("is-active");
	$("#step_link_" + step).addClass("is-active");

	if (step > current_step) {
		$("#step_" + current_step).toggle('slide', {
			direction: 'left'
		}, 600);
		setTimeout(function () {
			$("#step_" + step).toggle('slide', {
				direction: 'right'
			}, 600);
		}, 600);
	} else if (step < current_step) {
		$("#step_" + current_step).toggle('slide', {
			direction: 'right'
		}, 600);
		setTimeout(function () {
			$("#step_" + step).toggle('slide', {
				direction: 'left'
			}, 600);
		}, 600);
	}
	current_step = step;
};
