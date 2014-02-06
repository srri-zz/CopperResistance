// Wire class
function Wire(streamDiv, storyDiv, action, category, query){

	this.query = query;
	this.category = category;

	this.action = action;
	this.start = 0;
	this.streamDiv = streamDiv;
	this.storyDiv = storyDiv;
	this.active = new Story(0);
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

Wire.prototype.loadStream = function(){
	
	var url = "http://localhost:8888/CopperResistance/wire/load/"+this.category+"/"+this.start
	
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

	var url = "http://localhost:8888/CopperResistance/wire/load/search";
	
	$.get(url, { start: this.start, q: query}, function( data ) { $("#stream").append(data); });
}

// Story class
function Story(id){

	this.id = id;

}

Story.prototype.load = function(target){

	$(target+"-wrap").css({ opacity: 0.2 });

	$.getJSON("http://localhost:8888/CopperResistance/story/"+this.id, function( data ) {
		$(target+"-wrap").show();
		$(target+"-placeholder").hide();
		$(target+"-title").html(data.title);
		$(target+"-title-form").val(data.title);

		$(target+"-date").html(data.date);
		$(target+"-link").attr("href", data.link)
		$(target+"-source").html(data.source);
		$(target+"-content").html(data.content);
		$(target+'-con').scrollTop(0);

		$(target+"-wrap").css({ opacity: 1 });


	});
}
