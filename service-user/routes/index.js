var express = require('express');
var router = express.Router();
const userRouter            = require('./users')
const refreshTokensRouter            = require('./refreshTokens');

router.use("/api/",         userRouter);
router.use("/api/",         refreshTokensRouter);

module.exports = router;
