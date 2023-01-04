const express = require('express');
const dotenv  = require('dotenv')
const path = require('path');
const cookieParser = require('cookie-parser');
const logger = require('morgan');

dotenv.config();

const allRoutes       = require('./routes');


const app = express();

app.use(logger('dev'));
app.use(express.json({limit:'50mb'}));
app.use(express.urlencoded({ extended: false,limit:'50mb' }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use(allRoutes);

module.exports = app;
