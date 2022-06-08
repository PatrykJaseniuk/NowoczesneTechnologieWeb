//auth modules
const express = require('express');
const router = express.Router();
const passport = require('passport');


//auth with google
router.get(
    '/google',
    passport.authenticate('google', { scope: ['profile'] })
);

//googel auth callback
router.get(
    '/google/callback',
    passport.authenticate(
        'google',
        {successRedirect: '/dashboard', failureRedirect: '/auth/google/failure' }
    )
);

module.exports = router;