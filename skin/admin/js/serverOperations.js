function remove(url,form = null) {
	if(confirm("Are you sure want to delete?")){
		if(form){
			mage.setForm(form).setUrl(url).load();
		}else{
		mage.setUrl(url).load();
		}
	}
}

function fileUpload(id, url) {
	var filesArray = [];
	var data = new FormData();
	var files = $('#'+id)[0].files;
	$.each(files, function (key, file){
		// console.log(file);
        data.append('file[]',file);
      }); 
	mage.setUrl(url).resetParams().setParams(data).upload();
}

function submitContent(url) {
	var content = CKEDITOR.instances.content.getData();
	var formData = $('#saveForm').serializeArray();
	formData[2]['value'] = content;
	console.log(formData);
	mage.setUrl(url).resetParams().setParams(formData).load();
}
