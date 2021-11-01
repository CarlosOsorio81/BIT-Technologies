const singleComic = {
    render: () => {
        
        let idParameter = new URLSearchParams(window.location.search);
        //console.log("id es: "+idParameter.get('id'));

        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics/'+idParameter.get('id')+'?ts=9&apikey=e92d9a401a0300d4b9e80b0964d9ef16&hash=0e187be3348823a006ef2076ac1d7293';
        const container = document.querySelector('#single-comic-row');
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
                    month = date.getMonth();
                    dt = date.getDate();

                   console.log(comicDate = dt+'-'+nmonth+'-'+year);

                    if (dt < 10) { dt = '0' + dt; }
                    // if (month < 10) { month = '0' + month; }
                    switch(month){
                        case 1: nmonth = "January"; break;
                        case 2: nmonth = "February"; break;
                        case 3: nmonth = "March"; break;
                        case 4: nmonth = "April"; break;
                        case 5: nmonth = "May"; break;
                        case 6: nmonth = "June"; break;
                        case 7: nmonth = "July"; break;
                        case 8: nmonth = "August"; break;
                        case 9: nmonth = "September"; break;
                        case 10: nmonth = "October"; break;
                        case 11: nmonth = "November"; break;
                        case 12: nmonth = "December"; break;
                        default: nmonth = ""; break;
                    }

                    if(nmonth != ""){ let comicDate = dt+'-'+nmonth+'-'+year; }
                    else { let comicDate = new Date(comicDateISO); }
                    
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
                container.innerHTML = contentHTML;
                
                document.getElementById('available-stores-row').insertAdjacentElement('afterend', available);
                singleComicCharacters.render();
            })

    }
};


const singleComicCharacters = {
    render: () => {
        
        let idParameter = new URLSearchParams(window.location.search);

        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics/'+idParameter.get('id')+'/characters?ts=9&apikey=e92d9a401a0300d4b9e80b0964d9ef16&hash=0e187be3348823a006ef2076ac1d7293';
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

singleComic.render();
