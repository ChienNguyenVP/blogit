var imagesOptions = {
	filebrowserImageBrowseUrl: '/files?type=Images',
	filebrowserImageUploadUrl: '/files/upload?type=Images&_token=',
	filebrowserBrowseUrl: '/files?type=Files',
	filebrowserUploadUrl: '/files/upload?type=Files&_token='
};

function Editor(selector){
	CKEDITOR.replace( selector, imagesOptions);
}