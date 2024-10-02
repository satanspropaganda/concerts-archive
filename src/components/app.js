import React, { useEffect, useState} from "react";
import axios from "../modules/axios"
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Navbar from "./navbar";
import Dashboard from '../views/dashboard';
import Concerts from '../views/concerts';
import Bands from '../views/bands';
import Band from '../views/band';
import Archive from '../views/archive'; 
import Single from '../views/single'; 

export default function  ConcertArchive() {
  const [loading, setLoading] = useState(true);
  const [bands, setBands] = useState([]);
  const [venues, setVenues] = useState([]);
  const [countries, setCountries] = useState([]);
  const [cities, setCities] = useState([]);
  const [total, setTotal] = useState();

  const fetchData = () => {
    Promise.all([
    axios.get('/bands'),
    axios.get('/venues'),
    axios.get('/countries'),
    axios.get('/cities'),
    axios.get('/stats')]).then(function(values) {
      setBands(values[0].data);
      setVenues(values[1].data);
      setCountries(values[2].data);
      setCities(values[3].data);
      setTotal(values[4].data);
      setLoading(false);
    });
  }
  useEffect(() => {
      if(loading){
        fetchData();
      }
  });
  return (
    <BrowserRouter basename="/concerts-archive">
        <Navbar />
        {loading && <div className="loader-container"><span className="loader"></span></div>}
        {!loading && (
          <Routes>
          <Route exact path="/" element={<Dashboard total={total} bands={bands} venues={venues} cities={cities} countries={countries}/>} />
          <Route path="/concerts" element={<Concerts bands={bands} venues={venues} cities={cities} countries={countries} />} />
          <Route path="/bands">
            <Route index element={<Bands bands={bands} />} />
            <Route path=":bandId" element={<Band bands={bands} venues={venues} cities={cities} countries={countries} />} />
          </Route>
          <Route path="/countries">
            <Route index element={<Archive archiveTitle={"Countries"} items={countries} />} />
            <Route path=":singleId" element={<Single type="country" bands={bands} venues={venues} cities={cities} countries={countries} />} />
          </Route>
          <Route path="/venues">
            <Route index element={<Archive archiveTitle={"Venues"} items={venues} />} />
            <Route path=":singleId" element={<Single type="venue" bands={bands} venues={venues} cities={cities} countries={countries} />} />
          </Route> 
          <Route path="/cities">
            <Route index element={<Archive archiveTitle={"Cities"} items={cities}/>} />
            <Route path=":singleId" element={<Single type="city" bands={bands} venues={venues} cities={cities} countries={countries} />} />
          </Route>
          </Routes>
        )}
    </BrowserRouter>
  )
} 
