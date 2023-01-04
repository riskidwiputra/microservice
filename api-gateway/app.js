// NPM
var express             = require('express');
var path                = require('path');
var cookieParser        = require('cookie-parser');
var logger              = require('morgan');
const dotenv            = require('dotenv')
dotenv.config();
// Local
const allRoutes         = require('./routes');

var app = express();

app.use(logger('dev'));
app.use(express.json({limit:'50mb'}));
app.use(express.urlencoded({ extended: false,limit:"50mb" }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use(allRoutes);

module.exports = app;
