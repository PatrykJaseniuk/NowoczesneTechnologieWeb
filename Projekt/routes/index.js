const express = require('express');

const router = express.Router();

//@desc    Login/Landing Page
//@route    GET /
router.get('/', (req, res) => {
    res.render('login');
});

//route for dashboard
router.get('/dashboard', (req, res) => {
    res.render('dashboard');
});

//route for login page with layout login
router.get('/login', (req, res) => {
    res.render('login', { layout: 'login' });
});

// logout route
router.get(
    '/logout',
    (req, res) => {
        req.logout();
        res.redirect('/');
    }
);


module.exports = router;