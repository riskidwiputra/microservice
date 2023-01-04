var express = require('express');
var router = express.Router();

const {getAll,createMedia,deleteMedia}           = require("../../controllers/MediaController")

/* GET users listing. */
router.get('/', getAll);

router.post("/",  createMedia);

router.delete('/:id' , deleteMedia);

module.exports = router;
