const apiAdapter = require("../adapterRequest");
const {
  URL_SERVICE_PRODUCT
} = process.env;

const api = apiAdapter(URL_SERVICE_PRODUCT);

module.exports = async (req,res) => {
  try{
    console.log(req.body);
    const media = await api.post('/api/products', req.body);
    
    return res.json(media.data);
    
  }catch(err){
    if (err.code === 'ECONNREFUSED') {
      return res.status(500).json({ status: 'error', message: 'service unavailable' });
    }
    const {status,data} = err.response;
    return res.status(status).json(data);
  }
}

