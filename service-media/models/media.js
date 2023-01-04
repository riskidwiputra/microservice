'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class media extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  }
  media.init({
    image: DataTypes.STRING,
    deletedAt  : DataTypes.DATE,
  }, {
    sequelize,
    modelName: 'media',
    tableName : 'media',
    paranoid: true,
  });
  return media;
};