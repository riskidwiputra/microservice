const apiAdapter = require("../adapterRequest");
const {
  URL_SERVICE_MEDIA
} = process.env;

const api = apiAdapter(URL_SERVICE_MEDIA);

module.exports = async (req,res) => {
  try{
    console.log(req.body);
    const media = await api.post('/api/media', req.body);
    
    return res.json(media.data);
    
  }catch(err){
    if (err.code === 'ECONNREFUSED') {
      return res.status(500).json({ status: 'error', message: 'service unavailable' });
    }
    const {status,data} = err.response;
    return res.status(status).json(data);
  }
}

