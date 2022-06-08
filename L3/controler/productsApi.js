// products object
var products = [
    {
        id: 1,
        name: ' iPhone X',
        price: 999.99,
        category: 'Phones',
        description: 'telophone to call your friends',
        producer: 'Apple',
        image: 'https://thumbs.dreamstime.com/b/new-iphone-features-all-screen-design-99917162.jpg://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone/x/iphone-x-silver-select-2018?wid=470&hei=556&fmt=png-alpha&qlt=95&.v=1550897371706'
    },
    {
        id: 2,
        name: ' galaxy S10',
        price: 1000.99,
        category: 'Phones',
        description: 'telophone to call your enemys',
        producer: 'Samsung',
        image: 'https://www.mediaexpert.pl/media/cache/resolve/gallery/images/17/1768369/Smartfon-SAMSUNG-Galaxy-S10-_8-512GB-SM-G975-Ceramic-Black-front-tyl.jpg'
    },
]


module.exports = function (app) {
    app.get('/productsapi', function (req, res) {
        // if request contain inpute _description_id call function getDiscriptionOfProduct
        if (req.query._description_id) {
            if (req.query._json) {
                res.json(getDescriptionOfProduct(req.query._description_id));
                console.log('send json');
            } else {
                res.send(getDescriptionOfProduct(req.query._description_id));
            }
        }
        else if (req.query._sort && req.query._order) {
            let sortBy = req.query._sort;
            let order = req.query._order;
            let result = products.sort(
                (a, b) => {
                    if (order === 'asc') {
                        return a[sortBy] > b[sortBy] ? 1 : -1;
                    } else {
                        return a[sortBy] < b[sortBy] ? 1 : -1;
                    }
                }
            );
            res.send(result);
        }
        else if (req.query._filterBy && req.query._where) {
            let filterBy = req.query._filterBy;
            let where = req.query._where;
            let result = products.filter(
                (a) => {
                    let string1 = a[filterBy].toString();
                    let string2 = where.toString();
                    //if string1 contains string2 return true
                    return string1.includes(string2);
                }
            );
            res.send(result);
        }
        else {
            res.send(products);
        }

    });
}

function getDescriptionOfProduct(id) {
    for (var i = 0; i < products.length; i++) {
        if (products[i].id == id) {
            return products[i].description;
        }
    }
}