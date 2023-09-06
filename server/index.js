const express = require('express')
const mysql = require('mysql')
const cors = require('cors')

const app = express()

app.use(cors())
app.use(express.json()) //to send json files

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password:'root123',
    database:'try2db',
})

//Login
app.post ('/login',(req,res) => {
    const username = req.body.username;
    const password = req.body.password;

    db.query("SELECT * FROM regcustomer WHERE username = ? AND password = ?", [username,password],
    (err,result) => {
        if(err){
            req.setEncoding({err: err})
        }else{
            if(result.length>0){
                res.send(result)
            }else{
                res.send({message: "WRONG USERNAME OR PASSWORD"})
            }
        }
    }
    )
})

//Register
app.post('/register', (req,res) => {
    //console.log(req.body);
    const email = req.body.email; //email property of the data contained in the request body
    const username = req.body.username;
    const password = req.body.password;

    db.query("INSERT INTO regcustomer (email,username,password) VALUES (?,?,?)", [email,username,password],
    (err,result) => {
        if (err){
            console.error(err);
            res.status(500).send({ message: "Errorr" }); //500 indicates serverside error
        }else {
            console.log("Registered");
            res.send("succeded")
        }
        /* if(result) {
            res.send(result);
        }else {
            res.send({message: "ENTER CORRECT DETAILS"})
        } */
    })
})

//for Customer Details
app.get ("/regcustomer", (req,res) => {
    db.query("SELECT * FROM regcustomer", (err,result) => {
        if (err){
            res.status(500).json({error: err.message});
        }else{
            res.status(200).json(result);
        }
    })
})



app.listen("5001", () => {
    console.log("Running in 3001")
})
