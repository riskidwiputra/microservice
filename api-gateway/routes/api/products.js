const express               = require('express')
const router                = express.Router();

const create              = require('./product/create');
const destroy             = require('./product/destroy');
const getAll              = require('./product/getAll');

router.post("/products",  create);
router.delete('/products/:id',   destroy);
router.get("/products", getAll);


module.exports = router;
