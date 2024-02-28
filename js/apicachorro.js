// <<<<<<< HEAD
function mostrarProcessando() {
    var divProcessando = document.createElement('div')
    divProcessando.id = 'processandoDiv';
    divProcessando.style.position = 'fixed';
    divProcessando.style.top = '50%';
    divProcessando.style.left = '50%';
    divProcessando.style.transform = 'translate(-50%, -50%)';
    divProcessando.innerHTML = '<img src="./img/spinnerLoop2.gif"  width="70px" alt="Processando..." title="Processando..." >';
    document.body.appendChild(divProcessando);
}

function esconderProcessando() {
    var divProcessando = document.getElementById('processandoDiv')
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}

mostrarProcessando()
const url = `https://api.thedogapi.com/v1/images/search?limit=12`;
const api_key = 'live_ep6ec38kvxos48aK6AUl9bF9IeFrw54hl1XuJkwglcoAugHCv3ZxoGAEdZiFlQwD'

fetch(url, {
    headers: {
        'x-api-key': api_key
    }
})
    .then(response => response.json())
    .then((data) => {
        let imagesData = data;
        imagesData.map(function (imageData) {

            let image = document.createElement('img');
            image.src = `${imageData.url}`;

            let gridCell = document.createElement('div');
            gridCell.classList.add('col-lg-3');
            gridCell.classList.add('col-md-6');
            gridCell.classList.add('col-sm-6');
            gridCell.classList.add('d-flex');
            gridCell.classList.add('justify-content-center');
            gridCell.classList.add('aling-items-center');
            image.classList.add('img-fluid');
            gridCell.appendChild(image)

            document.getElementById('grid').appendChild(gridCell);

        });
        esconderProcessando()
    })
    .catch(function (error) {
        console.log(error);
    });

// =======

// const url = `https://api.thedogapi.com/v1/images/search?limit=10`;
// const api_key = 'live_ep6ec38kvxos48aK6AUl9bF9IeFrw54hl1XuJkwglcoAugHCv3ZxoGAEdZiFlQwD'
//
// fetch(url, {
//     headers: {
//         'x-api-key': api_key
//     }
// })
//     .then(response => response.json())
//     .then((data) => {
//         let imagesData = data;
//         imagesData.map(function (imageData) {
//
//             let image = document.createElement('img');
//             image.src = `${imageData.url}`;
//
//             let gridCell = document.createElement('div');
//             gridCell.classList.add('col-2');
//             gridCell.classList.add('d-flex');
//             gridCell.classList.add('justify-content-center');
//             gridCell.classList.add('aling-items-center');
//             image.classList.add('img-fluid');
//             gridCell.classList.add('col-lg-2');
//             gridCell.appendChild(image)
//
//             document.getElementById('grid').appendChild(gridCell);
//
//         });
//     })
//     .catch(function (error) {
//         console.log(error);
//     });
// >>>>>>> 8367d48404698042b5f822e442382fd1ad29d691
