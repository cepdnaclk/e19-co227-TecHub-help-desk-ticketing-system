import React, { useState } from 'react'
import './Page.css'
import Axios from 'axios'

const Login = () => {
  const [username,setUsername] = useState("");
  const [password,setPassword] = useState("");

  const [loginStatus,setLoginStatus] = useState("");

  //Login
  const log_in = (e) => {
    e.preventDefault(); //to stop auto refreshing the page
    Axios.post("http://localhost:4001/login", {
      username: username,
      password: password,
    }).then((response) => {
      //if getting an error
      if(response.data.message){
        setLoginStatus(response.data.message)
      }else{
        setLoginStatus(response.data[0].email)
      }
    })
  }

  return (
    <div className='page'>
      <div className='cards'>
      <h2>Login</h2>
      
      <form className='form'>
        <div>
          <label>Username: </label>
          <input onChange={(e)=> {setUsername(e.target.value)}} type='text'/>
        </div>
        <div>
          <label>Password: </label>
          <input onChange={(e)=> {setPassword(e.target.value)}} type='password'/>
        </div>
        
      </form>
      <button onClick={log_in} className='btn'>Log in</button>

      <pre/>
      <h5>{loginStatus}</h5>
      
    </div>
    </div>
  )
}

export default Login