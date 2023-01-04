
const isBase64 = require("is-base64");
const base64Img = require('base64-img');
const fs =require('fs');

const MediaModel           = require("../models").media;

const createMedia = async (req,res)=> {
    try{

        const { image } = req.body;
        if(!isBase64(image,{mimeRequired:true})){
            return res.status(400).json({
                status : 'false',
                message : 'invalid base64'
            });
        }
       base64Img.img(image, './public/images',Date.now(),async(err,filepath)=> {
            if(err){
                return res.status(400).json({
                    status: "false",
                    message : err.message
                })
            }
            const filename = filepath.split('/').pop();

            let media =  await MediaModel.create({
               image : filename
            });

            return res.status(201).json({
                status: "true",
                message : "Data added successfully.",
                data : {
                    id : media.id,
                    image : `${req.get('host')}/images/${filename}`
                }
            })

       })
        
    } catch (error) {
        return res.status(409).json({
            "status": false,
            "message": "data failed to add.",
            "error" : error
        });
    }
}

const getAll = async (req,res) => {
    const media = await MediaModel.findAll({
        attributes : ['id','image']
    })

    const changePathImage = media.map((data) => {
        data.image = `${req.get('host')}/${data.image}`;
        return data;
    })

    return res.json({
        status : true,
        data: changePathImage
    })
}

const deleteMedia = async(req,res) => {
    const id = req.params.id;

    const media = await MediaModel.findByPk(id);

    if(!media) {
        return res.status(404).json({
            status: "false",
            message : 'Media Not Found'
        });
    }

    fs.unlink(`./${media.image}`, async(err) => {
        if(err) {
            return res.status(400).json({
                status : 'false',
                message : err.message
            })
        }
        await media.destroy();

        return res.json({
            status : true,
            message : 'image deleted'
        })
    })
}
module.exports = {
    getAll,createMedia,deleteMedia
}