const express = require('express');
const { Z_PARTIAL_FLUSH } = require('zlib');

const router = express.Router();

//@desc    Login/Landing Page
//@route    GET /
router.get('/', (req, res) => {
    //send back xml
    res.send('<h1>Hello World</h1>');
});

module.exports = router;