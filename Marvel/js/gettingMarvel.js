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
        
        class structComics {
            constructor(s_comicId, s_comicName, s_comicCover) {
                this.s_comicId = s_comicId;
                this.s_comicName = s_comicName;
                this.s_comicCover = s_comicCover;
            }
        }
        
        var s_structComics = [];


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

                    // console.log(comicCover);
                    
                    s_structComics.push(new structComics(comicId, comicName, comicCover));
                }

                s_structComics.sort(function(a,b){
                    if(a.s_comicName < b.s_comicName) {return -1;}
                    if(a.s_comicName > b.s_comicName) {return 1;}
                    return 0;
                })
                
               //console.log(s_structComics.length);

                for(const comic of json.data.results){
                 
                    if(i % 4 == 0){ contentHTML += "<tr>"; }

                    contentHTML += "<td>";
                    contentHTML += "    <div class='md-col-4'>";
                    contentHTML += "        <center><a href='singleComic.php?id="+s_structComics[i].s_comicId+"'>";
                    contentHTML += "            <img src='"+s_structComics[i].s_comicCover+"' alt='' class='img-thumbnail'>";
                    contentHTML += "        </a></center>";
                    contentHTML += "        <br>";
                    contentHTML += "        <h5 class='title'>"+s_structComics[i].s_comicName+"</h5>";
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
