var products = {
    kolumny: ["name", "description", "producer", "price","opinion", 'kolumna'],
    wiersze: [
        {
            id: 1,
            komorki: ["Product 1", "Description 1", "Producer 1", 12.99, "good"]
        },
        {
            id: 2,
            komorki: ["Product 2", "Description 2", "Producer 2", 13.99, "bad"]
        },
        {
            id: 3,
            komorki: ["Product 1", "Description 1", "Producer 1", 12.99, "moderate"]
        },

    ]
}
export default function (req, res) {
    let { filterBy, where, sortBy, order } = getDataFormRequest(req);
    console.log(filterBy, where, sortBy, order);
    console.log(req.url)

    let result= Object.assign({}, products);


    // if (req.query._description_id) {
    //     if (req.query._json) {
    //         res.json(getDescriptionOfProduct(req.query._description_id));
    //         console.log('send json');
    //     } else {
    //         res.send(getDescriptionOfProduct(req.query._description_id));
    //     }
    // }
    if (filterBy && where) {
        // get columnIndex 
        let columnIndex = products.kolumny.indexOf(filterBy);

        result.wiersze = products.wiersze.filter(
            (wiersz) => {
                let string1 = wiersz.komorki[columnIndex].toString();
                let string2 = where.toString();
                //if string1 contains string2 return true
                return string1.includes(string2);
            }
        );
    }    
    if (sortBy && order) {
        result = result.sort(
            (a, b) => {
                if (order === 'asc') {
                    return a[sortBy] > b[sortBy] ? 1 : -1;
                } else {
                    return a[sortBy] < b[sortBy] ? 1 : -1;
                }
            }
        );
    }
    res.send(result);
}

function getDescriptionOfProduct(id) {
    for (var i = 0; i < products.length; i++) {
        if (products[i].id == id) {
            return products[i].description;
        }
    }
}

const filterByQueryString = '_filterBy';
const whereQueryString = '_where';
const sortByQueryString = '_sort';
const orderQueryString = '_order';

function getUrl({ filterBy, where, sortby, order }) {
    let url = 'api/products?';
    if (filterBy) {
        url += `${filterByQueryString}=${filterBy}&`;
    }
    if (where) {
        url += `${whereQueryString}=${where}&`;
    }
    if (sortby) {
        url += `${sortByQueryString}=${sortby}&`;
    }
    if (order) {
        url += `${orderQueryString}=${order}&`;
    }
    return url;
}

function getDataFormRequest(req) {
    let filterBy = req.query[filterByQueryString];
    let where = req.query[whereQueryString];
    let sortby = req.query[sortByQueryString];
    let order = req.query[orderQueryString];
    return { filterBy, where, sortby, order };
}

export function getProducts({ filterBy, where, sortBy, order }) {
    let url = getUrl({ filterBy, where, sortBy, order });
    return fetch(url)
        .then(res => res.json())
}



