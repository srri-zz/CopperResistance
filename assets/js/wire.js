// Wire class
function Wire(streamDiv, storyDiv){

	this.start = 0;
	this.streamDiv = streamDiv;
	this.storyDiv = storyDiv;
	this.active = new Story(0);

}

Wire.prototype.setCategory = function(id){
    this.cat = id;
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
	var url; 
	if (this.cat !== undefined){
		url = "wire/load/"+this.cat+"/"+this.start
	} else {
		url = "wire/load/all/"+this.start
	}

	$.get(url, function( data ) { $("#stream").append(data); });
}
Wire.prototype.loadMore = function(){
	this.start = this.start + 15;
	this.loadStream();
}
Wire.prototype.clearStream = function(){
    $("#stream").empty();
    this.start = 0;
}

Wire.prototype.updateCategory = function(id){
    this.setCategory(id);
    this.clearStream();
    this.loadStream();
}

// Story class
function Story(id){

	this.id = id;

}

Story.prototype.load = function(target){
	$.getJSON("story/"+this.id, function( data ) {
		$(target+"-title").html(data.title);
		$(target+"-date").html(data.date);
		$(target+"-link").attr("href", data.link)
		$(target+"-source").html(data.source);
		$(target+"-content").html(data.content);
		$(target+'-con').scrollTop(0);
		console.log("woo");
	});
}
