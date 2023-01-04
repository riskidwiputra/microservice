const express               = require('express')
const router                = express.Router();
const mediaRouter           = require('./media');

const create                = require('./media/create');
const destroy                = require('./media/destroy');
const getAll                = require('./media/getAll');


router.post("/",  create);
router.delete("/:id",  destroy);
router.get("/",  getAll);

module.exports = router;
