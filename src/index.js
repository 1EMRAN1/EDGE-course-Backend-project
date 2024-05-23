const express = require('express')
const bcrypt = require('bcrypt')
const app = express()
const port = 3000;
const collection = require("./config");
const collection2= require("./config2");


app.set('view engine','ejs');
app.set('layout','./layout')

app.use(express.json());
app.use(express.urlencoded({extended: false}));

app.use(express.static("public"));

app.get('/', (req, res) => {
  res.render("login");
})

app.get('/home', (req, res) => {
  res.render("home");
  })
app.get('/signup', (req, res) => {
    res.render("signup");
  }) 
app.get('/add', (req, res) => {
    res.render("addstudent");
  })   



//login user
app.post("/login", async (req,res)=>{
    try {
     // console.log(req.body.username);
     const check = await collection.findOne({name: req.body.username})
 
     if(!check){
       res.send("user name cannot be found");
     }
     
     //compare the password
     const isPasswordMatch = await bcrypt.compare(req.body.password,check.password);
     if(isPasswordMatch){
       res.render("home");
     }else{
       req.send("wrong password");
     }
    } catch (error) {
       res.send("wrong Details");
    }
  })

//register user  
app.post('/signup', async(req, res) => {
    const data ={
        name: req.body.username,
        password:req.body.password,
        email:req.body.email
    }

    //check if the user already exists in the data base
    const existingUser = await collection.findOne(
      {name: data.username}
    );

    if(existingUser){
      res.send("Username already exists.Please try a different username");
    }else{

    //hash the password using bcrypt  

    const saltRounds =10;//number of salt rounds for bcrypt

    const hashedPassword = await bcrypt.hash(data.password,saltRounds);

    data.password = hashedPassword;//replace the hash password with original

    const userdata = await collection.insertMany(data);
    console.log(userdata);
    res.render("login");
  }
  })

  
//register student  
app.post('/add', async(req, res) => {
  const data2 ={
      name: req.body.username,
      id:req.body.id,
      Department: req.body.department,
      phone:req.body.phone,
      email:req.body.email
  }
  //check if the student already exists in the data base
  const existingUser2 = await collection.findOne(
    {name: data2.username}
  );
  const existingId2 = await collection.findOne(
    {id: data2.id}
  );
  console.log("working");
  if(existingUser2||existingId2){
    res.send("name/id already exists.Please try a different name/id");
  }else{
    const userdata2 = await collection2.insertMany(data2);
    console.log(userdata2);
    console.log("successfully added");
    res.render("home")
}
})
  
//login user
app.get("/search", async (req,res)=>{
  try {
    const Collections = await collection2.find();
    console.log(Collections);
    res.render('search',{Collections});
  } catch (error) {
     res.send("wrong Details");
  }
})

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`)
  })