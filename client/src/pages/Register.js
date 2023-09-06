import React, { useState } from 'react'
import Axios from 'axios'

const Register = ({onReg}) => {
  const [email,setEmail] = useState("");
  const [username,setUsername] = useState("");
  const [password,setPassword] = useState("");

  //const [registerStatus,setRegisterStatus] = useState([]);

    //Register
    const registerr = (e) => {
        e.preventDefault();
        Axios.post("http://localhost:4001/register", {
          email: email,
          username: username,
          password: password,
        }).then((response) => {
          console.log("sending succeded");
          setEmail('');
          setUsername('');
          setPassword('');
          /* if(response.data.message){
            setRegisterStatus(response.data.message);
          }else{
            setRegisterStatus("REGISTERED SUCCESSFULLY")
          } */
          if(!response.data.message){  //for customer details
            onReg(email,username,password);
          }
        })
      }  

  return (
    <div className='page'>
        <div>
            <h2>Register</h2>
            <form>
                <div>
                    <label>Email:</label>
                    <input onChange={(e)=> {setEmail(e.target.value)}} type='email'/>
                </div>
                <div>
                    <label>Username: </label>
                    <input onChange={(e)=> {setUsername(e.target.value)}} type='text'/>
                </div>
                <div>
                    <label>Password: </label>
                    <input onChange={(e)=> {setPassword(e.target.value)}} type='password'/>
                </div>
                
            </form>
            <button onClick={registerr} className='btn'>Register</button>
        </div>
    </div>
  )
}

export default Register