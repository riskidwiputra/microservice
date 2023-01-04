const express = require('express');
const router = express.Router();

const refreshTokensCreate= require('./refresh-tokens/create');
const refreshTokensgetToken= require('./refresh-tokens/getToken');

router.post('/auth/refresh-tokens', refreshTokensCreate);
router.get('/auth/get-tokens', refreshTokensgetToken);

module.exports = router;
