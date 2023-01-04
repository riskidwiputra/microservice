const express               = require('express')
const router                = express.Router();

const refreshToken          = require('./refresh-tokens/refreshToken');


router.post("/auth/refresh-tokens",  refreshToken);

module.exports = router;
