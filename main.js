// function statusChange() {
//     var status = document.getElementById('status');
//     // console.log('name: '+document.getElementById('searchbox').value);
//     if (status.innerHTML == 1) {
//         status.innerHTML = '2';
//         // console.log(0);
//     } else {
//         status.innerHTML = '1';
//         // console.log(1);
//     }
// }


function search() {
    var name = document.getElementById('searchbox').value;
    var status = document.getElementById('status').innerHTML;
    // console.log(name, status);
    fetchSearchData(name, status);
}


function fetchSearchData(name, status) {
    fetch('search.php', {
        method: 'POST',
        body: new URLSearchParams('name=' + name)
    })
        .then(res => res.json())
        .then(res => viewSearchResult(res, status))
        .catch(e => console.log('Error: ' + e))
}

function viewSearchResult(data, status) {
    const dataViewer = document.getElementById("dataViewer");
    // console.log('View: ' + status);
    dataViewer.innerHTML = "";

    for (let i = 0; i < data.length; i++) {
        const li = document.createElement("li");
        if (status == data[i]["statusId"]) {
            li.innerHTML = data[i]["auftragsnummer"] + ' ' + data[i]["bezeichnung"] + ' ' + data[i]["details"] + ' ' + data[i]["statusId"];
            dataViewer.appendChild(li);
        }
    }
}