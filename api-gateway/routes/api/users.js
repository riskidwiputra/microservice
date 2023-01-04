const express               = require('express')
const router                = express.Router();

const register              = require('./users/register');
const logout                = require('./users/logout');
const login                 = require('./users/login');
const getUser               = require('./users/getUser');
const verifyTokens          = require('../../middlewares/verifyToken');

router.post("/auth/register",  register);
router.post('/auth/login', login);
router.post('/auth/logout',  verifyTokens, logout);
router.get("/users",  verifyTokens,getUser);

module.exports = router;
