function showAnswer(){
	var answer = getAnswer();
	var question = $("#question").val();

	if (question.trim() != "") {
		$('#answer-bg').show();
		let answer_html = "<div><p>" + question + "</p></div><div><h3>" + answer + "</h3></div>";
		$("#answer").html(answer_html);
		$("#vk").attr("href", 'go.php?go=vk' + '&q=' + question + '&a=' + answer);
		$("#facebook").attr("href", 'go.php?go=facebook' + '&q=' + question + '&a=' + answer);
		$("#twitter").attr("href", 'go.php?go=twitter' + '&q=' + question + '&a=' + answer);
		$("#telegram").attr("href", 'go.php?go=telegram' + '&q=' + question + '&a=' + answer);
	}
};

$(document).ready(function(){
	$("#modal-main").modal()
});