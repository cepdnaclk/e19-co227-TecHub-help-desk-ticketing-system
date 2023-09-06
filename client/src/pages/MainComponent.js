import React, { useEffect, useState } from "react";
import axios from "axios";
import Customers from "./Customers";

const MainComponent = () => {
  const [customers, setCustomers] = useState([]);

  useEffect(() => {
    axios.get("http://localhost:5001/regcustomer").then((response) => {
      setCustomers(response.data);
    });
  }, []);

  return (
    <div>
      <h1>Registered Customers</h1>
      <div>
        {customers.map((custData, index) => (
          <Customers key={index} custData={custData} />
        ))}
      </div>
    </div>
  );
};

export default MainComponent;
