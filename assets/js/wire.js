// Wire class
function Wire(streamDiv, storyDiv, action, category, query, orderby, dir){

	this.query = query;
	this.category = category;

	this.action = action;
	this.start = 0;
	this.streamDiv = streamDiv;
	this.storyDiv = storyDiv;
	this.active = new Story(0);

	this.orderby = orderby;
	this.dir = dir;
}

Wire.prototype.load = function(){
	
	switch(this.action)
	{
	case 'load':
	  this.loadStream();
	  break;
	case 'search':
	  this.search(this.query);
	  break;
	default:
	  this.loadStream();
	}

}

Wire.prototype.changeStory = function(id){

	$('#story-'+id).addClass("active")
	if (id != this.active.id){
		$('#story-'+this.active.id).removeClass("active")
	}

	this.active = new Story(id);
	this.active.load(this.storyDiv);

}

Wire.prototype.updateStory = function(){

	this.active.update(this.storyDiv);

}

Wire.prototype.updateStoryCategory = function(id, cat_name){

	this.active.updateCategory(id);

	$("#current-story-category").html(cat_name);

	if(this.category != 'all' && this.category != cat_name.toLowerCase()){
		$("#story-"+this.active.id).fadeOut();
	}

}


Wire.prototype.loadStream = function(){
	
	var url = site_root+"wire/load/"+this.category+"/"+this.start+"?orderby="+this.orderby+"&dir="+this.dir;
	console.log(url);
	
	$.get(url, function( data ) { $("#stream").append(data); });

}

Wire.prototype.loadMore = function(){
	this.start = this.start + 15;
	this.load();
}
Wire.prototype.clearStream = function(){
    $("#stream").empty();
    this.start = 0;
}

Wire.prototype.updateCategory = function(id){
    this.category = id;
    this.clearStream();
    this.loadStream();
}

Wire.prototype.search = function(query){

	var url = site_root+"wire/load/search";
	
	$.get(url, { start: this.start, q: query}, function( data ) { $("#stream").append(data); });
}

// Story class
function Story(id){

	this.id = id;

}

Story.prototype.load = function(target){

	if($("#current-story-con").is(':hidden')){

		window.location.href = $("#story-link-"+this.id).text();

	} else {

		$.getJSON(site_root+"story/"+this.id, function( data ) {
			$("#wire-stats").hide();
			$(target+"-wrap").show();
			$(target+"-placeholder").hide();
			$(target+"-title").html(data.title);
			$(target+"-title-form").val(data.title);

			$(target+"-category").html(data.category);

			$(target+"-date").html(data.date);
			$(target+"-date-form").val(data.date);

			$(target+"-link").attr("href", data.link);
			//$("#edit-story-form").attr("action", 'http://localhost:8888/CopperResistance/story/update/'+data.id);
			$(target+"-link-form").val(data.link);

			$(target+"-desc-form").text(data.description);

			$(target+"-source").html(data.source);
			$(target+"-content").html(data.content);
			$(target+'-con').scrollTop(0);

		});
	}

	
}

Story.prototype.update = function(target){

	$.post( site_root+"story/update/"+this.id, $( "#edit-story-form" ).serialize(), function(data){

	});

}

Story.prototype.updateCategory = function(cat_id){

	$.post( site_root+"story/update/category/"+this.id+'/'+cat_id);

}