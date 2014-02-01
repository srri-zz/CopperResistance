// Wire class
function Wire(category, streamDiv, storyDiv){

	this.start = 0;
	this.streamDiv = streamDiv;
	this.storyDiv = storyDiv;
	this.cat = category;
	this.active = new Story(0);

}

Wire.prototype.changeCategory = function(){}
Wire.prototype.changeStory = function(id){

	$('#story-'+id).addClass("active")
	if (id != this.active.id){
		$('#story-'+this.active.id).removeClass("active")
	}

	this.active = new Story(id);
	this.active.load(this.storyDiv);

}

Wire.prototype.loadStream = function(){
	$.get("stream.php?start="+this.start+"&cat="+this.cat, function( data ) {
	  $("#stream").append(data);
	});

}
Wire.prototype.loadMore = function(){
	this.start = this.start + 15;
	this.loadStream();
}

// Story class
function Story(id){

	this.id = id;

}

Story.prototype.load = function(target){
	$.getJSON("story.php?id="+this.id, function( data ) {
		$(target+"-title").html(data.title);
		$(target+"-date").html(data.date);
		$(target+"-link").attr("href", data.link)
		$(target+"-source").html(data.source);
		$(target+"-content").html(data.content);
		$(target+'-con').scrollTop(0);
	});
}
