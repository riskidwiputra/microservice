const express = require('express');
const router = express.Router();

const register                = require('./users/register');
const login                = require('./users/login');
const logout                = require('./users/logout');
const getUser                = require('./users/getUser');
const getAll                = require('./users/getUsers');

router.post('/auth/register', register);
router.post('/auth/login', login);
router.post('/auth/logout', logout);
router.get('/users/:id', getUser);
router.get('/users', getAll);

module.exports = router;
