// var public = "14cfef4a2ed0248b39a2f9897cbe6dd8";
// var private = "7a8440697044535a7cf8f78a38f391511e8cd87e";
// var hash = "17a8440697044535a7cf8f78a38f391511e8cd87e14cfef4a2ed0248b39a2f9897cbe6dd8"; //1+private+public
const marvel = {
    render: () => {
        console.log("Hola");


        // const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?ts=1&apikey=14cfef4a2ed0248b39a2f9897cbe6dd8&hash=DDC175E39E993B7AF94EB8F6856AA1CB';
        const urlAPI = 'https://gateway.marvel.com:443/v1/public/comics?apikey=';
        const container = document.querySelector('#marvel-row');
        let contentHTML = '';

        fetch(urlAPI)
            .then(res => res.json())
            .then((json) => {
                console.log(json, 'RES.JSON')
            })

        console.log("Adios");
    }
};

marvel.render();