const mongoose= require('mongoose');

const conn = mongoose.connect("mongodb+srv://root35:vczjwjGX6N7n35nG@cluster-10.bmbervx.mongodb.net/PROJECT-0?retryWrites=true&w=majority&appName=Cluster-10");

conn.then(() => {console.log("connected");})
.catch(()=>{console.log("not connected");});

const LoginSchema = new mongoose.Schema({
    name:{
        type: String,
        required: true
    },
    password:{
         type:String, required:true
        },
    email:{
        type: String, required: true
    }    
});

//Collection part
const collection = new mongoose.model("Users",LoginSchema);

module.exports = collection;