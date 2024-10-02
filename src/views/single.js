import React, { useEffect, useState } from "react";
import axios from "../modules/axios"
import ConcertList from "../components/concertlist";
import { useParams } from 'react-router-dom';
export default function Single({type, bands, countries, cities, venues}) {
    const [concerts, setConcerts] = useState({loading: true, concerts: []});
    const { singleId } = useParams()
    
    function getTitle(type) {
        switch(type) {
            case 'city': 
            return cities
            break;
            case 'country': 
            return countries
            break;
            case 'venue': 
            return venues
            break;
        }
    }
    useEffect(() => {
        fetchConcerts(singleId);
      }, [singleId]);
    function fetchConcerts(singleId) {
        setConcerts({loading: true, concerts: []});
        const fetchData = async () => {
          try {
            const { data: response } = await axios.get('/gigs?'+type+'=' + singleId);
            setConcerts({loading: false, concerts: response});
          } catch (error) {
            console.error(error.message);
          }
        }
        fetchData();
      }
    return(
        <div>
           {concerts.loading && <div className="loader-container"><span className="loader"></span></div>}
            {!concerts.loading && (
            <div>
            <h2>{getTitle(type, singleId)[singleId].name}</h2>
            <ConcertList concerts={concerts.concerts} bands={bands} venues={venues} cities={cities} countries={countries} />
            </div>
            )} 
        </div>
    )
}