function verify () {
	var status = true;
	var name = $("#name").val();
	var syear = $("#year").val();//s for string
	var year = parseInt(syear);
	var introduce = $("#introduce").val();
	var img = $("#img").val();
	// $("#name").focus();
	// $("#name").after("pls enter name");
	if (name.replace(/(^s*)|(s*$)/g, "").length == 0) 
	{
		status = false;
		$("#tname").text("please enter name");
	};
	
	if (year > 2020 || year < 1990 || syear == '')
	{
		status = false;
		$("#tyear").text("please enter valid year");
	};

	if (introduce.replace(/(^s*)|(s*$)/g, "").length == 0)
	{
		status = false;
		$("#tintroduce").text("please enter introduce");
	};

	if (img.replace(/(^s*)|(s*$)/g, "").length == 0)
	{
		status = false;
		$("#timg").text("please choose a photo");
	};

	return status;//debugging

}