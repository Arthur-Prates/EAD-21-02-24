
const url = `https://api.thedogapi.com/v1/images/search?limit=30`;
const api_key = 'live_ep6ec38kvxos48aK6AUl9bF9IeFrw54hl1XuJkwglcoAugHCv3ZxoGAEdZiFlQwD'

fetch(url, {
    headers: {
        'x-api-key': api_key
    }
})
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        let imagesData = data;
        imagesData.map(function (imageData) {

            let image = document.createElement('img');
            image.src = `${imageData.url}`;

            let gridCell = document.createElement('div');
            gridCell.classList.add('col-2');
            gridCell.classList.add('d-flex');
            gridCell.classList.add('justify-content-center');
            gridCell.classList.add('aling-items-center');
            image.classList.add('img-fluid');
            gridCell.classList.add('col-lg-2');
            gridCell.appendChild(image)

            document.getElementById('grid').appendChild(gridCell);

        });
    })
    .catch(function (error) {
        console.log(error);
    });
