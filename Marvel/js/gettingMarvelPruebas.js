// var public = "e92d9a401a0300d4b9e80b0964d9ef16";
// var private = "7a3943ee32063dc5199bfab482e4bf083acf1114";
// var ts = "9"
// var hash = "97a3943ee32063dc5199bfab482e4bf083acf1114e92d9a401a0300d4b9e80b0964d9ef16"; //ts+private+public
// var hash = "0e187be3348823a006ef2076ac1d7293";

let comicId = '';
const marvel = {
    render: () => {

        
        //const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?ts=1&apikey=e92d9a401a0300d4b9e80b0964d9ef16';
        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?ts=9&apikey=e92d9a401a0300d4b9e80b0964d9ef16&hash=0e187be3348823a006ef2076ac1d7293';
        const container = document.querySelector('#marvel-comics-row');
        let contentHTMLM = '';

        fetch(urlAPI)
            .then(res => res.json())
            .then((json) => {
                console.log(json, 'RES.JSON')
                var i = 0;
                for(const comic of json.data.results){
                    comicId = comic.id;
                    let comicName = comic.title;
                    let comicCover = comic.thumbnail.path +"."+ comic.thumbnail.extension;
                    let comicUrl = comic.urls[0].url;

                    //console.log(comicName +" "+ comicId);
                    console.log(comicCover);
                    

                    if(i % 4 == 0){ contentHTMLM += "<tr>"; }

                    contentHTMLM += "<td>";
                    contentHTMLM += "    <div class='md-col-4'>";
                    // contentHTMLM += "        <a href='"+comicUrl+"' target='_blank'>";
                    // contentHTMLM += "        <a href='singleComic.php?id="+comicId+"' target='_blank'>";
                    contentHTMLM += "            <img src='"+comicCover+"' alt='' class='img-thumbnail'  data-bs-toggle='modal' data-bs-target='#exampleModal_"+comicId+"'>";
                    // contentHTMLM += "        </a>";
                    contentHTMLM += "        <h3 class='title'>"+comicName+"</h3>";
                    contentHTMLM += "    </div>";
                    contentHTMLM += "<td>";


                    contentHTMLM += '<div class="modal fade" id="exampleModal_'+comicId+'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">'
                    contentHTMLM += '    <div class="modal-dialog modal-dialog-centered">'
                    contentHTMLM += '        <div class="modal-content" id="single-comic-row'+comicId+'">'
                    contentHTMLM += '            ID: '+comicId;
                    contentHTMLM += '        </div>'
                    contentHTMLM += '    </div>'
                    contentHTMLM += '</div>'
                    

                    i++;
                    if(i % 4 == 0){ contentHTMLM += "</tr>"; }
                }
                container.innerHTML = contentHTMLM;

                for(const comic of json.data.results){
                    comicId = comic.id;                    
                    singleComicP.render();
                }

            })

    }
};


const singleComicP = {
    render: () => {
        
        // let idParameter = new URLSearchParams(window.location.search);
        // console.log("id es: "+idParameter.get('id'));

        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics/'+comicId+'?ts=9&apikey=e92d9a401a0300d4b9e80b0964d9ef16&hash=0e187be3348823a006ef2076ac1d7293';
        const containerC = document.querySelector('#single-comic-row-'+comicId);
        const available = document.querySelector('#tiendas-disponibles');
        let contentHTML = '';


        fetch(urlAPI)
            .then(res => res.json())
            .then((json) => {
                console.log("Single Comic: ");
                console.log(json, 'RES.JSON');
                var i = 0;
                for(const comic of json.data.results){
                    //console.log(comic);
                    let comicId = comic.id;
                    let comicCover = comic.thumbnail.path +"."+ comic.thumbnail.extension;
                    let comicName = comic.title;
                    let comicIssue = comic.issueNumber;
                    let comicDateISO = comic.dates[0].date;
                    let comicPages = comic.pageCount;
                    let comicDescriptions = comic.description;

                    let comicUrl = comic.urls[0].url;


                    date = new Date(comicDateISO);
                    year = date.getFullYear();
                    month = date.getMonth()+1;
                    dt = date.getDate();

                    if (dt < 10) { dt = '0' + dt; }
                    if (month < 10) { month = '0' + month; }

                    let comicDate = dt+'-'+month+'-'+year;
                    
                    contentHTML += '<div class="col-md-5">'
                    contentHTML += '    <img src="'+comicCover+'" class="img-fluid rounded-start" alt="...">'
                    contentHTML += '</div>'
                    contentHTML += '<div class="col-md-7">'
                    contentHTML += '    <div class="card-body">'
                    contentHTML += '        <h5 class="card-title">'+comicName+'</h5>'

                    contentHTML += '        <hr />'
                    // contentHTML += '        <p class="card-text">ID: <?php echo $_GET["id"]; ?> </p>'
                    contentHTML += '        <p class="card-text">Issue: '+comicIssue+'</p>'
                    contentHTML += '        <p class="card-text">Release date: '+comicDate+'</p>'
                    contentHTML += '        <p class="card-text">Page Count: '+comicPages+'</p>'
                    contentHTML += '        <p class="card-text">Description: '+comicDescriptions+'</p>'

                    contentHTML += '        <hr />'

                    contentHTML += '        <details>'
                    contentHTML += '            <summary>Availability: </summary>'
                    contentHTML += '            <div class="details-content" id="available-stores-row">'                    
                    contentHTML += '            </div>'
                    contentHTML += '        </details>'

                    contentHTML += '        <hr />'

                    contentHTML += '        <p class="card-text">Characters: </p>'
                    contentHTML += '        <div class="container">'
                    contentHTML += '            <div class="row" id="single-comic-characters-row">'
                    contentHTML += '            </div>'
                    contentHTML += '        </div>'


                    contentHTML += '        <br>'
                    contentHTML += '        <p class="card-text float-end"><small class="text-muted"><a href="'+comicUrl+'">Pagina Oficial</a></small></p>'
                    contentHTML += '        <br>'
                    contentHTML += '    </div>'
                    contentHTML += '</div>'

                    

                }
                containerC.innerHTML = contentHTML;
                
                document.getElementById('available-stores-row').insertAdjacentElement('afterend', available);
                singleComicCharacters.render();
            })

    }
};


const singleComicCharacters = {
    render: () => {
        
        let idParameter = new URLSearchParams(window.location.search);

        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics/'+comicId+'/characters?ts=9&apikey=e92d9a401a0300d4b9e80b0964d9ef16&hash=0e187be3348823a006ef2076ac1d7293';
        const containerC = document.querySelector('#single-comic-characters-row');
        let contentHTMLC = '';

        fetch(urlAPI)
            .then(res => res.json())
            .then((json) => {
                console.log("Characters: ");
                console.log(json, 'RES.JSON');
                var i = 0;
                for(const character of json.data.results){
                    //console.log(character);
                    let characterImage = character.thumbnail.path +"."+ character.thumbnail.extension;
                    let characterName = character.name;
                    let characterWiki = character.urls[1].url;
                    
                    contentHTMLC += '<div class="col-2">'
                    contentHTMLC += '   <a href="'+characterWiki+'" target="_blank">';
                    contentHTMLC += '       <img src="'+characterImage+'" class="img-thumbnail" alt="'+characterName+'">'
                    contentHTMLC += '   </a>';
                    contentHTMLC += '</div>'
                    

                }
                containerC.innerHTML = contentHTMLC;
            })

    }
};


marvel.render();
