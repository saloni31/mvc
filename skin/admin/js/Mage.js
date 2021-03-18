let Base = function(){};
Base.prototype = {
	method : 'post',
	url : null,
	params : {},
	form : null,

	setMethod : function(method){
		this.method = method;
		return this;
	},

	getMethod : function(){
		return this.method;
	},

	setUrl : function(url){
		this.url = url;
		return this;
	},

	getUrl : function(){
		return this.url;
	},

	setParams : function(params){
		this.params = params;
		return this;
	},

	getParams : function(){
		return this.params;
	},

	setParam : function(key, value){
		this.params[key] = value;
		return this;
	},

	getParam : function(key){
		if(typeof this.params[key] == 'undefined'){
			return null;
		}
		return this.params[key];
	},

	resetParams : function(){
		this.params = [];
		return this;
	},

	setForm : function(form){
		if(form == 'undefined'){
			return null;
		}

		this.resetParams();
		this.setUrl(form.action);
		this.setMethod(form.method);
		this.setParams($(form).serializeArray());
		return this;
	},

	getForm : function(){
		return this.form;
	},


	load : function(){
		var self = this;
		$.ajax({
		  url: this.getUrl(),
		  method: this.getMethod(),
		  data: this.getParams(),
		  success: function(response){
		  	self.manageHtml(response);
		  },
		  failure : function(response){
		  	alert(response);
		  }
		  	
		});
	},

	upload : function(){
		var self = this;
		$.ajax({
		  contentType : false,
		  processData : false,
		  url: this.getUrl(),
		  method: this.getMethod(),
		  data: this.getParams(),
		  success: function(response){
		  	self.manageHtml(response);
		  },
		  failure : function(response){
		  	alert(response);
		  }
		  	
		});
	},

	manageHtml : function(response){
		if(typeof response.element !== 'object'){
				return null;
	  	}
	  	if(typeof response.element == 'object'){
		  	$(response.element).each(function(i,element){	
		  		$(element.selector).html(element.html);
		  	});
	  	}else{
		  	$(response.element.selector).html(response.element.html);
	  	}
	}
}
