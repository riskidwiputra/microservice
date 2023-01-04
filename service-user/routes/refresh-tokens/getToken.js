const RefreshToken           = require("../../models").refreshToken;

module.exports = async (req, res) => {
  const refreshToken = req.query.refresh_token;
  const token = await RefreshToken.findOne({
    where: { token: refreshToken }
  });

  if (!token) {
    return res.status(400).json({
      status: 'error',
      message: 'invalid token'
    });
  }

  return res.json({
    status: 'success',
    token
  });
}