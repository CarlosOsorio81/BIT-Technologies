// var public = "e92d9a401a0300d4b9e80b0964d9ef16";
// var private = "7a3943ee32063dc5199bfab482e4bf083acf1114";
// var ts = "9"
// var hash = "97a3943ee32063dc5199bfab482e4bf083acf1114e92d9a401a0300d4b9e80b0964d9ef16"; //ts+private+public
// var hash = "0e187be3348823a006ef2076ac1d7293";
const marvel = {
    render: () => {

        
        //const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?ts=1&apikey=e92d9a401a0300d4b9e80b0964d9ef16';
        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?ts=9&apikey=e92d9a401a0300d4b9e80b0964d9ef16&hash=0e187be3348823a006ef2076ac1d7293';
        const container = document.querySelector('#marvel-row');
        let contentHTML = '';

        fetch(urlAPI)
            .then(res => res.json())
            .then((json) => {
                console.log(json, 'RES.JSON')
                for(const comic of json.data.results){
                    let comicId = comic.id;
                    let comicName = comic.title;
                    let comicCover = comic.thumbnail.path +"."+ comic.thumbnail.extension;
                    let comicUrl = comic.urls[0].url;

                    //console.log(comicName +" "+ comicId);
                    console.log(comicCover);

                    contentHTML += "<div class='md-col-4'>";
                    contentHTML += "<a href='"+comicUrl+"' target='_blank'>";
                    contentHTML += "<img src='"+comicCover+"' alt='' class='img-thumbnail'>";
                    contentHTML += "</a>";
                    contentHTML += "<h3 class='title'>"+comicName+"</h3></div>";
                    //contentHTML += '<h3 class="title">'+comicName+'</h3>';
                }
                container.innerHTML = contentHTML;
            })

    }
};

marvel.render();