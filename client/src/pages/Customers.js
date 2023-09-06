import React from 'react'

const Customers = ({custData}) => {
/*   const [custData,setCustData] = useState({email: '', username: '', password: ''});

  const customer = (email,username,password) => {
    setCustData({email,username,password});
  } */

  return (
    <div>
        
        <div>
            <h2>{custData.username}</h2>
            <p>Email: {custData.email}</p>
            <p>Password: {custData.password}</p>
            
        </div>
    </div>
  )
}

export default Customers