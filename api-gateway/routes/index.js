const express               = require('express')
const router                = express.Router();

const usersRouter            = require('./api/users')
const paymentsRouter         = require('./api/payments')
const ordersRouter           = require('./api/orders')
const mediaRouter            = require('./api/media')
const RefreshTokenRouter     = require('./api/webhook')
const WebHookRouter          = require('./api/refreshTokens')
const ProductRouter          = require('./api/products')

router.use("/api",                  usersRouter);
router.use("/api",                  RefreshTokenRouter);
router.use("/api",                  WebHookRouter);
router.use("/api",                  ProductRouter);
router.use("/api/payments",         paymentsRouter);
router.use("/api/orders",           ordersRouter);
router.use("/api/media",            mediaRouter);


module.exports = router;