function del (id)
{
	if("undefined" == typeof id)alert("用console也要记得加参数……");//just egg pain
	question = confirm("你确认要删除此条记录吗？");
	if (question){
		$.post("{:U('Index/delete')}",{"id":id},
			function (back) {
				if (back.status == 0) 
				{
					alert("删除成功！")
					$("#trid-"+id).remove();//在html中移除对应项
				} 
				else
				{
					alert("删除失败！")
					location.reload();
				};
			});

	}
}

$(document).ready(function() {
	$('.popup-with-form').magnificPopup({
		type: 'ajax',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
});