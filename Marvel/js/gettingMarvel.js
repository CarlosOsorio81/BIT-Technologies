// var public = "e92d9a401a0300d4b9e80b0964d9ef16";
// var private = "7a3943ee32063dc5199bfab482e4bf083acf1114";
// var ts = "9"
// var hash = "97a3943ee32063dc5199bfab482e4bf083acf1114e92d9a401a0300d4b9e80b0964d9ef16"; //ts+private+public
// var hash = "0e187be3348823a006ef2076ac1d7293";
const marvel = {
    render: () => {

        
        //const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?ts=1&apikey=e92d9a401a0300d4b9e80b0964d9ef16';
        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?ts=9&apikey=e92d9a401a0300d4b9e80b0964d9ef16&hash=0e187be3348823a006ef2076ac1d7293';
        const container = document.querySelector('#marvel-comics-row');
        let contentHTML = '';

        fetch(urlAPI)
            .then(res => res.json())
            .then((json) => {
                console.log(json, 'RES.JSON')
                var i = 0;
                for(const comic of json.data.results){
                    let comicId = comic.id;
                    let comicName = comic.title;
                    let comicCover = comic.thumbnail.path +"."+ comic.thumbnail.extension;
                    let comicUrl = comic.urls[0].url;

                    console.log(comicId);
                    

                    if(i % 4 == 0){ contentHTML += "<tr>"; }

                    contentHTML += "<td>";
                    contentHTML += "    <div class='md-col-4'>";
                    contentHTML += "        <center><a href='singleComic.php?id="+comicId+"'>";
                    contentHTML += "            <img src='"+comicCover+"' alt='' class='img-thumbnail'>";
                    contentHTML += "        </a></center>";
                    contentHTML += "        <br>";
                    contentHTML += "        <h5 class='title'>"+comicName+"</h5>";
                    contentHTML += "    </div>";
                    contentHTML += "<td>";

                    i++;
                    if(i % 4 == 0){ contentHTML += "</tr>"; }
                }
                container.innerHTML = contentHTML;
            })

    }
};

marvel.render();
