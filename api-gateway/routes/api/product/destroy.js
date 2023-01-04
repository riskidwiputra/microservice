const apiAdapter = require("../adapterRequest");
const {
  URL_SERVICE_PRODUCT
} = process.env;

const api = apiAdapter(URL_SERVICE_PRODUCT);

module.exports = async (req, res) => {
  try {
    const id = req.params.id;
    const media = await api.delete(`api/products/${id}`);
    return res.json(media.data);
  } catch (error) {

    if (error.code === 'ECONNREFUSED') {
      return res.status(500).json({ status: 'error', message: 'service unavailable' });
    }

    const { status, data } = error.response;
    return res.status(status).json(data);
  }
}