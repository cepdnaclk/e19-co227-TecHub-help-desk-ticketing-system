import './App.css';
import {BrowserRouter,Route,Routes} from 'react-router-dom'
import Home from './pages/Home'
import Login from './pages/Login';
import Register from './pages/Register';
import Customers from './pages/Customers';
import MainComponent from './pages/MainComponent';

function App() {
  return (
    <BrowserRouter>
      <div>
        <Routes>
          <Route path='/home' element={<Home/>} ></Route>
          <Route path='/login' element={<Login/>} />
          <Route path='/regist' element={<Register/>}/>
          <Route path='/cust' element={<Customers/>} />
          <Route path='/' element={<MainComponent/>}/>
        </Routes>
      </div>
    </BrowserRouter>
  );
}

export default App;
