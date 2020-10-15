let all_dossier = document.querySelectorAll('#div-dossier-video #dossier');

all_dossier.forEach(function(item, dix) {
    item.addEventListener('click', function(e) {
        //console.log(item.value);
        //sendData({ dossier: item.value });
        fetchServer({ test: item.value });
    })
});

function fetchServer(data) {
    let urlEncodedData = "",
        urlEncodedDataPairs = [],
        name;

    for (name in data) {
        urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
    }
    urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

    let httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
        alert('Abandon :( Impossible de créer une instance de XMLHTTP');
        return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('POST', '../Controller/controll-video', true);
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(urlEncodedData);

    function alertContents() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                //alert(httpRequest.responseText);
            } else {
                alert('Il y a eu un problème avec la requête.');
            }
        }
    }
}