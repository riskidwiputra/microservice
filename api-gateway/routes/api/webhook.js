const express               = require('express')
const router                = express.Router();

const webhook              = require('./webhook/webhook');

router.post("webhook",  webhook);

module.exports = router;
