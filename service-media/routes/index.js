const express               = require('express')
const router                = express.Router();

const mediaRouter            = require('./api/media')

router.use("/api/media",         mediaRouter);


module.exports = router;