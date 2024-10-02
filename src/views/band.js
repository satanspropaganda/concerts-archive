import React, { useEffect, useState } from "react";
import axios from "../modules/axios"
import ConcertList from "../components/concertlist";
import { useParams } from 'react-router-dom';
export default function Band({bands, countries, cities, venues}) {
    const [concerts, setConcerts] = useState({loading: true, concerts: []});
    const { bandId } = useParams()
    useEffect(() => {
        fetchConcerts(bandId);
      }, []);
    function fetchConcerts(bandId) {
        setConcerts({loading: true, concerts: []});
        const fetchData = async () => {
          try {
            const { data: response } = await axios.get('/gigs?band=' + bandId);
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
            <h2>{bands[bandId].name}</h2>
            <ConcertList concerts={concerts.concerts} bands={bands} venues={venues} cities={cities} countries={countries} />
            </div>
            )} 
        </div>
    )
}