$(document).ready(function(){
    // var API_key ="AIzaSyBjblqQiYQMXvq9Rv8g7B53-y1tQp9iSrs"
    var API_key ="AIzaSyADr5BLQb1yjMtHftZIhhUEj96FvESVLMM  "
    var video = ""
    $("#form").submit(function(event){
        event.preventDefault()
        

        var search =$("#search").val()
        videoSearch(API_key,search,5)
    })

    function videoSearch(key,search,maxResults){

        $("#videos").empty()
 $.get("https://www.googleapis.com/youtube/v3/search?key=" + key + "&type=video&part=snippet&maxResults="+ maxResults + "&q=" + search,function(data){
    console.log(data)
 
    data.items.forEach(item => {
        video = `
        <iframe  width="640" height="390" src="http://www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>

        `
        $("#videos").append(video)
        
    });
 })
    }

})
